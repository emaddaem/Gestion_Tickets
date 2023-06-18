<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

    public function connexion_client(Request $request)
    {
        $url_personnalisee = $request->get('url_personnalisee');
        return redirect()->route('login', $url_personnalisee);
    }

    public function inscription_client(Request $request)
    {
        $url_personnalisee = $request->get('url_personnalisee');
        return redirect()->route('register-user', $url_personnalisee);
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


    public function update(Request $request)
    {
        $entreprise = auth()->user()->entreprise;

        $validatedData = $request->validate([
            'logo' => "sometimes|image|max:8192",
            'nom' => 'sometimes',
            'description' => 'sometimes',
            'telephone' => 'sometimes',
            'adresse' => 'sometimes',
            'email' => ['sometimes', 'email', Rule::unique('entreprises')->ignore(auth()->user()->entreprise->id)],
            'url_personnalisee' => ['sometimes', Rule::unique('entreprises')->ignore(auth()->user()->entreprise->id)],
        ]);

        $logo = $request->file('logo');
        $nom_logo = uniqid() . '.' . $logo->getClientOriginalExtension();
        $logo->move(public_path('images/logos'), $nom_logo);

        $entreprise->update([
            'logo' => $nom_logo,
            'nom' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'description' => $validatedData['description'],
            'telephone' => $validatedData['telephone'],
            'adresse' => $validatedData['adresse'],
            'url_personnalisee' => $validatedData['url_personnalisee']
        ]);

        return redirect()->back()->with('success', "Les informations de l'entreprise ont bien été modifiées");
    }


    public function destroy(string $id)
    {
        //
    }
}
