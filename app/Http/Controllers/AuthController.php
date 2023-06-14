<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->intended('/client/dashboard');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration(string $entreprise_URL)
    {
        $entreprise = Entreprise::where('url_personnalisee', $entreprise_URL)->first();

        if(!$entreprise){
            $entreprise = null;
        }
        return view('auth.registration', compact('entreprise'));
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'telephone' => 'required',
            'entreprise_id' => 'sometimes',
        ]);

        User::create([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'telephone' => $request->get('telephone'),
            'entreprise_id' => $request->get('entreprise_id'),
        ]);

        return redirect()->intended('/');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
