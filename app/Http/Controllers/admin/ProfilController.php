<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admin = auth()->user();
        $entreprise = $admin->entreprise;

        $data_stats = [
            'nombreTickets' => Ticket::count(),
            'nombreClients' => User::where('role', 'client')->count(),
            'nombreAgents' => User::where('role', 'agent')->count(),
            'nombreAdmins' => User::where('role', 'admin')->count(),
        ];

        return view('admin/profil', compact('admin', 'entreprise', 'data_stats'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request)
    {
        $admin = User::find(auth()->user()->id);

        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'telephone' => 'required',
            'adresse' => 'required',
            'password' => 'sometimes',
        ]);

        $admin->update([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
            'adresse' => $validatedData['adresse']
        ]);

        if (isset($validatedData['password'])) {
            $admin->update([
                'password' => Hash::make($validatedData['password'])
            ]);
        }

        return redirect()->back()->with('success', "Vos informations personnelles ont bien été modifiées");
    }


    public function destroy(string $id)
    {
        //
    }
}
