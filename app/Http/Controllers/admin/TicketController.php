<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Jointure;
use App\Models\Priorite;
use App\Models\Statut;
use Illuminate\Http\Request;

use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tickets = Ticket::whereDate('created_at', Carbon::today())->get();

        $statuts_data = [
            'id_statut_nouveau' => Statut::where('nom', 'Nouveau')->value('id'),
            'id_statut_traitement' => Statut::where('nom', 'En cours de traitement')->value('id'),
            'id_statut_attente' => Statut::where('nom', 'En attente')->value('id'),
            'id_statut_resolu' => Statut::where('nom', 'Résolu')->value('id'),
    
            'nombreNouveauxTickets' => Ticket::where('statut_id', 'id_statut_nouveau')->count(),
            'nombreTicketsTraitement' => Ticket::where('statut_id', 'id_statut_traitement')->count(),
            'nombreTicketsattente' => Ticket::where('statut_id', 'id_statut_attente')->count(),
            'nombreTicketsResolus' => Ticket::where('statut_id', 'id_statut_resolu')->count(),
        ];

        // $id_statut_nouveau = Statut::where('nom', 'Nouveau')->value('id');
        // $id_statut_traitement = Statut::where('nom', 'En cours de traitement')->value('id');
        // $id_statut_attente = Statut::where('nom', 'En attente')->value('id');
        // $id_statut_resolu = Statut::where('nom', 'Résolu')->value('id');

        // $nombreNouveauxTickets = $tickets->where('statut_id', $id_statut_nouveau)->count();
        // $nombreTicketsTraitement = $tickets->where('statut_id', $id_statut_traitement)->count();
        // $nombreTicketsattente = $tickets->where('statut_id', $id_statut_attente)->count();
        // $nombreTicketsResolus = $tickets->where('statut_id', $id_statut_resolu)->count();

        return view('admin/index', compact('tickets', 'statuts_data'));
    }

    public function tickets()
    {
        $tickets = Ticket::all();

        return view('admin/tickets/tickets', compact('tickets'));
    }

    public function tickets_specifiques()
    {
        $tickets = Ticket::all();

        return view('admin/tickets/tickets_specifiques', compact('tickets'));
    }


    public function create()
    {
        $clients = User::where('role', 'client')->get();
        $agents = User::where('role', 'agent')->get();
        $statuts = Statut::all();
        $priorites = Priorite::all();
        $categories = Categorie::all();

        return view('admin/tickets/creer_ticket', compact('clients', 'agents', 'statuts', 'priorites', 'categories'));
    }


    public function store(Request $request)
    {
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

        $ticket = new Ticket([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'user_id' => $validatedData['client'],
            'agent_id' => $validatedData['agent'],
            'statut_id' => $validatedData['statut'],
            'priorite_id' => $validatedData['priorite'],
            'categorie_id' => $validatedData['categorie'],
        ]);
        $id_statut_nouveau = Statut::where('nom', 'Nouveau')->value('id');
        $ticket->statut_id = $id_statut_nouveau;
        $ticket->save();

        if ($request->file('jointures')) {
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

        return redirect()->route('admin.index')->with("success", "Le ticket a bien été ajouté.");
    }


    public function show(string $id)
    {
        $ticket = Ticket::find($id);

        return view('admin/tickets/ticket', compact('ticket'));
    }


    public function edit(string $id)
    {
        $ticket = Ticket::find($id);
        $agents = User::where('role', 'agent')->get();
        $clients = User::where('role', 'client')->get();
        $statuts = Statut::all();
        $priorites = Priorite::all();
        $categories = Categorie::all();

        return view('admin/tickets/modifier_ticket', compact('ticket', 'clients', 'agents', 'statuts', 'priorites', 'categories'));
    }


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

        return redirect()->route('admin.ticket', $ticket->id)->with('success', "Le ticket a été modifié avec succès");
    }


    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $jointures = $ticket->jointures;

        foreach ($jointures as $jointure) {
            Storage::disk('public')->delete('images/jointures/' . $jointure->chemin);
            $jointure->delete();
        }
        $ticket->delete();

        return redirect()->route('admin.index')->with('success', "Votre ticket a été supprimé avec succès");
    }
}
