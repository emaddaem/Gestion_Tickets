<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ticket;
use App\Models\Categorie;
use App\Models\Jointure;


class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tickets = Ticket::all();

        return view('client/index', compact('tickets'));
    }

    public function tickets()
    {
        $tickets = Ticket::all();

        return view('client/tickets/tickets', compact('tickets'));
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
            "description" => "required",
            "categorie" => "required",
            "images[]"
        ]);

        $ticket = new Ticket([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'categorie_id' => $validatedData['categorie'],
            'user_id' => $user_id,
        ]);
        $ticket->save();

        foreach ($request->file('images') as $image) {
            $nom_image = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/jointures'), $nom_image);

            $jointures = new Jointure([
                'chemin' => $nom_image,
                'ticket_id' => $ticket->id
            ]);
            $jointures->save();
        }
        
        return redirect()->route('client.index')->with("success", "Votre ticket a bien été ajouté. Elle sera examinée par l'administrateur.");
    }

    
    public function show()//string $id
    {
        return view('client/tickets/ticket');
    }

    
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
