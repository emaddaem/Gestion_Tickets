<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Ticket;
use App\Models\Categorie;
use App\Models\Jointure;
use App\Models\Commentaire;
use App\Models\Statut;


class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;

        $tickets = Ticket::where('user_id', $user_id)->get();

        $id_statut_nouveau = Statut::where('nom', 'Nouveau')->value('id');
        $id_statut_resolu = Statut::where('nom', 'Résolu')->value('id');

        $nombreNouveauxTickets = $tickets->where('statut_id', $id_statut_nouveau)->count();
        $nombreTicketsResolus = $tickets->where('statut_id', $id_statut_resolu)->count();

        $tickets = Ticket::where('user_id', $user_id)->latest()->limit(4)->get();

        return view('client/index', compact('tickets', 'nombreNouveauxTickets', 'nombreTicketsResolus', 'id_statut_nouveau', 'id_statut_resolu'));
    }

    public function tickets()
    {
        $user_id = auth()->user()->id;

        $tickets = Ticket::where('user_id', $user_id)->get();

        return view('client/tickets/tickets', compact('tickets'));
    }

    public function tickets_specifiques(string $id)
    {
        $user_id = auth()->user()->id;

        $tickets = Ticket::where('user_id', $user_id)->where('statut_id', $id)->get();

        $nom_statut = Statut::where('id', $id)->value('nom');

        return view('client/tickets/tickets_specifiques', compact('tickets', 'nom_statut'));
    }


    public function create()
    {
        $categories = Categorie::all();

        return view('client/tickets/creer_ticket', compact('categories'));
    }


    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $validatedData = $request->validate([
            "titre" => "required",
            "description" => "sometimes",
            "categorie" => "required",
            "jointures[]"
        ]);

        $ticket = new Ticket([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'categorie_id' => $validatedData['categorie'],
            'user_id' => $user_id,
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

        return redirect()->route('client.index')->with("success", "Votre ticket a bien été ajouté, il sera assigné à un agent le plutot possible.");
    }

    public function ajouter_jointures(Request $request, string $id)
    {
        $user_id = auth()->user()->id;

        $validatedData = $request->validate([
            "jointures[]"
        ]);

        if ($request->file('jointures')) {
            foreach ($request->file('jointures') as $jointure) {
                $nom_jointure = uniqid() . '.' . $jointure->getClientOriginalExtension();
                $jointure->move(public_path('images/jointures'), $nom_jointure);

                $jointure = new Jointure([
                    'chemin' => $nom_jointure,
                    'ticket_id' => $id
                ]);
                $jointure->save();
            }
        }

        return redirect()->back()->with("success", "Vos fichiers ont bien été enregistrés");
    }


    public function show(string $id)
    {
        $ticket = Ticket::find($id);

        return view('client/tickets/ticket', compact('ticket'));
    }


    public function edit(string $id)
    {
        $ticket = Ticket::find($id);
        $categories = Categorie::all();

        return view('client/tickets/modifier_ticket', compact('ticket', 'categories'));
    }


    public function update(Request $request, string $id)
    {
        $ticket = Ticket::find($id);

        $validatedData = $request->validate([
            "titre" => "required",
            "description" => "required",
            'categorie' => "required",
            "jointures.*" => "image|max:8192",
            "jointures[]",
        ]);

        $ticket->update([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'categorie_id' => $validatedData['categorie']
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

        return redirect()->route('client.ticket', $ticket->id)->with('success', "Votre ticket a été modifié avec succès");
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

        return redirect()->route('client.index')->with('success', "Votre ticket a été supprimé avec succès");
    }

    public function createCommentaire(Request $request, string $id)
    {
        $user_id = auth()->user()->id;
        $ticket = Ticket::find($id);

        $validated_data = $request->validate([
            "contenu" => "required|max:300",
        ]);

        $commentaire = new Commentaire([
            'contenu' => $validated_data['contenu'],
            'user_id' => $user_id,
            'ticket_id' => $ticket->id,
        ]);

        // $ticket->commentaire()->save($commentaire);
        $commentaire->save();

        return redirect()->back()->with('success', "Votre message a été envoyé");
    }
}
