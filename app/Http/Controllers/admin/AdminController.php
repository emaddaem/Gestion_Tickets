<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function admins()
    {
        $admins = User::where('role', 'admin')->get();

        return view('admin/admins/admins', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/admins/ajouter_admin');
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

        $admin = new User([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'telephone' => $request->get('telephone'),
            'password' => Hash::make($request->get('prenom') . '123'),
            'role' => 'admin',
        ]);
        $admin->save();

        return redirect()->route('admin.admins')->with("success", "Nouveau admin a bien été ajouté.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = User::find($id);

        // $id_statut_nouveau = Statut::where('nom', 'Nouveau')->value('id');
        // $id_statut_traitement = Statut::where('nom', 'En cours de traitement')->value('id');
        // $id_statut_attente = Statut::where('nom', 'En attente')->value('id');
        // $id_statut_resolu = Statut::where('nom', 'Résolu')->value('id');
        // $id_statut_non = Statut::where('nom', 'Nouveau')->value('id');

        // $statuts_data = [
        //     'id_statut_nouveau' => $id_statut_nouveau,
        //     'id_statut_traitement' => $id_statut_traitement,
        //     'id_statut_attente' => $id_statut_attente,
        //     'id_statut_resolu' => $id_statut_resolu,

        //     'nombreNouveauxTickets' => Ticket::where('agent_id', $id)->where('statut_id', $id_statut_nouveau)->count(),
        //     'nombreTicketsTraitement' => Ticket::where('agent_id', $id)->where('statut_id', $id_statut_traitement)->count(),
        //     'nombreTicketsattente' => Ticket::where('agent_id', $id)->where('statut_id', $id_statut_attente)->count(),
        //     'nombreTicketsResolus' => Ticket::where('agent_id', $id)->where('statut_id', $id_statut_resolu)->count(),
        // ];

        // $tickets = Ticket::where('agent_id', $id)->get();
        // , 'tickets', 'statuts_data'

        return view('admin/admins/admin', compact('admin'));
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

        return redirect()->back()->with('success', "Les changements ont bien été enregistrés");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::find($id);
        $admin->delete();

        return redirect()->route('admin.admins')->with('success', "L'admin a été supprimé avec succès");
    }
}
