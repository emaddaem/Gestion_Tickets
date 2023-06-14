<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EntrepriseController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'telephone_entreprise' => 'required',
            'nom_entreprise' => 'required',
            'email_entreprise' => 'required|email|unique:entreprises,email',
            'url_personnalisee' => 'required|string|unique:entreprises',
        ]);

        $entreprise = Entreprise::create([
            'nom' => $request->get('nom_entreprise'),
            'email' => $request->get('email_entreprise'),
            'telephone' => $request->get('telephone_entreprise'),
            'url_personnalisee' => $request->get('url_personnalisee')
        ]);

        User::create([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'telephone' => $request->get('telephone_entreprise'),
            'role' => 'admin',
            'entreprise_id' => $entreprise->id,
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('login')->with("success", "Votre entreprise a bien été inscrite dans notre système. Connectez-vous avec le compte admin.");
    }


    public function show(string $id)
    {
        //
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
