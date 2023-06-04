<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/miawdelete', function () {
    return view('miawdelete');
});

//Route d'admin
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin/index');
    });

    Route::get('/tickets', function () {
        return view('admin/tickets');
    });

    Route::get('/tickets_specifiques', function () {
        return view('admin/tickets_specifiques');
    });

    Route::get('/ticket', function () {
        return view('admin/ticket');
    });


    Route::get('/clients', function () {
        return view('admin/clients');
    });

    Route::get('/agents', function () {
        return view('admin/agents');
    });

    Route::get('/agent', function () {
        return view('admin/agent');
    });

    Route::get('/ajouter_agent', function () {
        return view('admin/ajouter_agent');
    });

    Route::get('/admins', function () {
        return view('admin/admins');
    });

    Route::get('/ajouter_admin', function () {
        return view('admin/ajouter_admin');
    });

    Route::get('/profil', function () {
        return view('admin/profil');
    });

    Route::get('/creer_ticket', function () {
        return view('admin/creer_ticket');
    });

    Route::get('/modifier_ticket', function () {
        return view('admin/modifier_ticket');
    });

    Route::get('/ajouter_client', function () {
        return view('admin/ajouter_client');
    });

    Route::get('/categories', function () {
        return view('admin/categories');
    });

    Route::get('/ajouter_categorie', function () {
        return view('admin/ajouter_categorie');
    });

    Route::get('/status', function () {
        return view('admin/status');
    });

    Route::get('/ajouter_status', function () {
        return view('admin/ajouter_status');
    });

    Route::get('/priorites', function () {
        return view('admin/priorites');
    });

    Route::get('/ajouter_priorite', function () {
        return view('admin/ajouter_priorite');
    });
});

//Route du client
Route::prefix('client')->group(function () {

    Route::get('/dashboard', function () {
        return view('client/index');
    });

    Route::get('/ticket', function () {
        return view('client/ticket');
    });

    Route::get('/creer_ticket', function () {
        return view('client/creer_ticket');
    });
});

//Auth Routes
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
