<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Jointure;
use App\Models\Priorite;
use App\Models\Statut;
use Illuminate\Http\Request;

use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $agent_id = auth()->user()->id;
        $tickets = Ticket::where('agent_id', $agent_id)->whereDate('created_at', Carbon::today())->get();

        $id_statut_nouveau = Statut::where('nom', 'Nouveau')->value('id');
        $id_statut_traitement = Statut::where('nom', 'En cours de traitement')->value('id');
        $id_statut_attente = Statut::where('nom', 'En attente')->value('id');
        $id_statut_resolu = Statut::where('nom', 'Résolu')->value('id');

        $id_priorite_urgente = Priorite::where('nom', 'Urgente')->value('id');
        $id_priorite_elevee = Priorite::where('nom', 'Elevée')->value('id');

        $statuts_data = [
            'id_statut_nouveau' => $id_statut_nouveau,
            'id_statut_traitement' => $id_statut_traitement,
            'id_statut_attente' => $id_statut_attente,
            'id_statut_resolu' => $id_statut_resolu,

            'id_priorite_urgente' => $id_priorite_urgente,
            'id_priorite_elevee' => $id_priorite_elevee,

            'nombreNouveauxTickets' => Ticket::where('agent_id', $agent_id)->where('statut_id', $id_statut_nouveau)->count(),
            'nombreTicketsTraitement' => Ticket::where('agent_id', $agent_id)->where('statut_id', $id_statut_traitement)->count(),
            'nombreTicketsattente' => Ticket::where('agent_id', $agent_id)->where('statut_id', $id_statut_attente)->count(),
            'nombreTicketsResolus' => Ticket::where('agent_id', $agent_id)->where('statut_id', $id_statut_resolu)->count(),
            
            'nombreTicketsUrgentes' => Ticket::where('agent_id', $agent_id)->where('priorite_id', $id_priorite_urgente)->count(),
            'nombreTicketsElevee' => Ticket::where('agent_id', $agent_id)->where('priorite_id', $id_priorite_elevee)->count(),

        ];


        return view('agent/index', compact('tickets', 'statuts_data'));
    }

    public function tickets()
    {
        $agent_id = auth()->user()->id;
        $tickets = Ticket::where('agent_id', $agent_id)->get();

        return view('agent/tickets/tickets', compact('tickets'));
    }

    public function tickets_specifiques(string $statut_id)
    {
        $agent_id = auth()->user()->id;

        if ($statut_id !== '0') {
            $tickets = Ticket::where('agent_id', $agent_id)->where('statut_id', $statut_id)->get();

            $nom_statut = Statut::where('id', $statut_id)->value('nom');
        } else {
            $tickets = Ticket::where('agent_id', null)->get();
            $nom_statut = null;
        }

        return view('agent/tickets/tickets_specifiques', compact('tickets', 'nom_statut'));
    }

    public function tickets_par_priorite(string $priorite_id)
    {
        $agent_id = auth()->user()->id;

        $tickets = Ticket::where('agent_id', $agent_id)->where('priorite_id', $priorite_id)->get();

        $nom_priorite = Priorite::where('id', $priorite_id)->value('nom');

        return view('agent/tickets/tickets_par_priorite', compact('tickets', 'nom_priorite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agent/tickets/creer_ticket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);

        return view('agent/tickets/ticket', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ticket = Ticket::find($id);
        $agents = User::where('role', 'agent')->get();
        $clients = User::where('role', 'client')->get();
        $statuts = Statut::all();
        $priorites = Priorite::all();
        $categories = Categorie::all();

        return view('agent/tickets/modifier_ticket', compact('ticket', 'clients', 'agents', 'statuts', 'priorites', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::find($id);

        $validatedData = $request->validate([
            "titre" => "required",
            "description" => "required",
            "client" => "required",
            "agent" => "sometimes",
            "statut" => "sometimes",
            "priorite" => "sometimes",
            "categorie" => "required",
            "jointures[]"
        ]);

        $ticket->update([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'agent_id' => $validatedData['agent'],
            'statut_id' => $validatedData['statut'],
            'priorite_id' => $validatedData['priorite'],
            'categorie_id' => $validatedData['categorie'],
        ]);

        if ($request->File('jointures')) {
            $ticket->jointures()->delete();
            foreach ($request->file('jointures') as $jointure) {
                $nom_jointure = uniqid() . '.' . $jointure->getClientOriginalExtension();
                $jointure->move(public_path('images/jointures'), $nom_jointure);

                $jointure = new Jointure([
                    'chemin' => $nom_jointure,
                    'ticket_id' => $ticket->id
                ]);

                $jointure->save();
            }
        }

        return redirect()->route('agent.ticket', $ticket->id)->with('success', "Le ticket a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createCommentaire(Request $request, string $id)
    {
        $agent_id = auth()->user()->id;
        $ticket = Ticket::find($id);

        $validated_data = $request->validate([
            "contenu" => "required|max:300",
        ]);

        $commentaire = new Commentaire([
            'contenu' => $validated_data['contenu'],
            'user_id' => $agent_id,
            'ticket_id' => $ticket->id,
        ]);

        $commentaire->save();

        return redirect()->back()->with('success', "Votre message a été envoyé");
    }

    public function fermer_ticket(string $id)
    {
        $ticket = Ticket::find($id);
        $id_statut_resolu = Statut::where('nom', 'Résolu')->value('id');

        $ticket->update([
            'statut_id' => $id_statut_resolu,
        ]);

        return redirect()->route('agent.tickets')->with('success', "Le ticket a été fermé avec succès");
    }
}
