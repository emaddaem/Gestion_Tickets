<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function clients()
    {
        $clients = User::where('role', 'client')->get();

        return view('admin/clients/clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/clients/ajouter_client');
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

        $client = new User([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'telephone' => $request->get('telephone'),
            'password' => Hash::make($request->get('prenom') . '123'),
        ]);
        $client->save();

        return redirect()->back()->with("success", "Nouveau client a bien été ajouté.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = User::find($id);

        return view('admin/clients/client', compact('client'));
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
        $client = User::find($id);
        $client->delete();

        return redirect()->route('admin.clients')->with('success', "Le client a été supprimé avec succès");
    }
}
