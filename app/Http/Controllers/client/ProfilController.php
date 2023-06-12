<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        return view('client/profil', compact('user'));
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email,' . $user_id,
            'telephone' => 'required',
            'adresse' => 'required',
            'actual_password' => 'sometimes',
            'password' => 'sometimes|confirmed',
            'password_confirmation' => 'sometimes|required_with:password',
        ]);

        $user->update([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
            'adresse' => $validatedData['adresse']
        ]);

        if (isset($validatedData['password']) && isset($validatedData['actual_password'])) {

            if (Hash::check($validatedData['actual_password'], $user->password)) {
                $user->update([
                    'password' => Hash::make($validatedData['password'])
                ]);
            }
            else{
                return redirect()->back()->withErrors(['actual_password' => 'Le mot de passe actuel est incorrect']);
            }
        }

        return redirect()->back()->with('success', "Vos informations personnelles ont bien été modifiées");
    }


    public function destroy(string $id)
    {
        //
    }
}
