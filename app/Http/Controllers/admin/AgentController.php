<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Statut;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function agents()
    {
        $agents = User::where('role', 'agent')->get();

        return view('admin/agents/agents', compact('agents'));
    }

    public function tickets_specifiques(string $statut_id, string $agent_id)
    {
        $agent = User::find($agent_id);

        if ($statut_id !== '0' && $agent_id !== '0') {
            $tickets = Ticket::where('agent_id', $agent_id)->where('statut_id', $statut_id)->get();

            $nom_statut = Statut::where('id', $statut_id)->value('nom');
        }

        return view('admin/tickets/tickets_specifiques', compact('agent', 'tickets', 'nom_statut'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/agents/ajouter_agent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'telephone' => 'required'
        ]);

        $agent = new User([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'telephone' => $request->get('telephone'),
            'password' => Hash::make($request->get('prenom') . '123'),
            'role' => 'agent',
        ]);
        $agent->save();

        return redirect()->back()->with("success", "Nouveau agent a bien été ajouté.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agent = User::find($id);

        $id_statut_nouveau = Statut::where('nom', 'Nouveau')->value('id');
        $id_statut_traitement = Statut::where('nom', 'En cours de traitement')->value('id');
        $id_statut_attente = Statut::where('nom', 'En attente')->value('id');
        $id_statut_resolu = Statut::where('nom', 'Résolu')->value('id');

        // $tickets = Ticket::where('agent_id', $id)->where('statut_id', '<>', $id_statut_resolu)->get();

        $statuts_data = [
            'id_statut_nouveau' => $id_statut_nouveau,
            'id_statut_traitement' => $id_statut_traitement,
            'id_statut_attente' => $id_statut_attente,
            'id_statut_resolu' => $id_statut_resolu,

            'nombreNouveauxTickets' => Ticket::where('agent_id', $id)->where('statut_id', $id_statut_nouveau)->count(),
            'nombreTicketsTraitement' => Ticket::where('agent_id', $id)->where('statut_id', $id_statut_traitement)->count(),
            'nombreTicketsattente' => Ticket::where('agent_id', $id)->where('statut_id', $id_statut_attente)->count(),
            'nombreTicketsResolus' => Ticket::where('agent_id', $id)->where('statut_id', $id_statut_resolu)->count(),
        ];

        return view('admin/agents/agent', compact('agent', 'statuts_data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'telephone' => 'required',
            'adresse' => 'required',
            'password' => 'sometimes',
        ]);

        $user->update([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
            'adresse' => $validatedData['adresse']
        ]);

        if (isset($validatedData['password'])) {
            $user->update([
                'password' => Hash::make($validatedData['password'])
            ]);
        }

        return redirect()->back()->with('success', "Les chanements ont bien été enregistrés");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agent = User::find($id);
        $agent->delete();

        return redirect()->route('admin.agents')->with('success', "L'agent a été supprimé avec succès");
    }

    public function rendre_admin(string $id)
    {
        $agent = User::find($id);
        
        $agent->update([
            'role' => 'admin',
        ]);

        return redirect()->back()->with('success', "L'agent ". $agent->nom . $agent->prenom . " est devenue un administrateur");
    }
}
