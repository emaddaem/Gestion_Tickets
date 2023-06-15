<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\EntrepriseController;

use App\Http\Controllers\admin\TicketController as TicketController_admin;
use App\Http\Controllers\admin\ProfilController as ProfilController_admin;
use App\Http\Controllers\admin\ClientController as ClientController_admin;
use App\Http\Controllers\admin\AgentController as AgentController_admin;
use App\Http\Controllers\admin\AdminController as AdminController_admin;

use App\Http\Controllers\agent\TicketController as TicketController_agent;
use App\Http\Controllers\agent\ProfilController as ProfilController_agent;

use App\Http\Controllers\client\TicketController;
use App\Http\Controllers\client\ProfilController;

use App\Http\Controllers\StatutController;
use App\Http\Controllers\PrioriteController;
use App\Http\Controllers\CategorieController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/Inscrire_entreprise', [EntrepriseController::class, 'store'])->name('entreprise.inscrire');

Route::post('/connexion_client', [EntrepriseController::class, 'connexion_client'])->name('entreprise.connexion_client');
Route::post('/inscription_client', [EntrepriseController::class, 'inscription_client'])->name('entreprise.inscription_client');

// Route d'admin
Route::group(['middleware' => 'admin'], function () {
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [TicketController_admin::class, 'index'])->name('admin.index');

        Route::get('/profil', [ProfilController_admin::class, 'index'])->name('admin.profil');

        Route::get('/tickets', [TicketController_admin::class, 'tickets'])->name('admin.tickets');

        Route::get('/tickets_specifiques/{statut_id}', [TicketController_admin::class, 'tickets_specifiques'])->name('admin.tickets_specifiques');

        Route::get('/tickets_specifiques/{statut_id}/{agent_id}', [AgentController_admin::class, 'tickets_specifiques'])->name('admin.agent_tickets_specifiques');

        Route::get('/ticket/{id}', [TicketController_admin::class, 'show'])->name('admin.ticket');

        Route::get('/creer_ticket', [TicketController_admin::class, 'create'])->name('admin.creer_ticket');

        Route::post('/enregistrer_ticket', [TicketController_admin::class, 'store'])->name('admin.enregistrer_ticket');

        Route::get('/modifier_ticket/{id}', [TicketController_admin::class, 'edit'])->name('admin.modifier_ticket');

        Route::put('/actualiser_ticket/{id}', [TicketController_admin::class, 'update'])->name('admin.update_ticket');

        Route::post('/assigner_agent/{id}', [TicketController_admin::class, 'assigner_agent'])->name('admin.assigner_agent');

        Route::get('/supprimer_ticket/{id}', [TicketController_admin::class, 'destroy'])->name('admin.supprimer_ticket');

        Route::post('/creer_commentaire/{id}', [TicketController_admin::class, 'createCommentaire'])->name('admin.creer_commentaire');



        Route::get('/clients', [ClientController_admin::class, 'clients'])->name('admin.clients');

        Route::get('/client/{id}', [ClientController_admin::class, 'show'])->name('admin.client');

        Route::put('/actualiser_client/{id}', [ClientController_admin::class, 'update'])->name('admin.update_client');

        Route::get('/ajouter_client', [ClientController_admin::class, 'create'])->name('admin.ajouter_client');

        Route::post('/enregistrer_client', [ClientController_admin::class, 'store'])->name('admin.enregistrer_client');

        Route::get('/supprimer_client/{id}', [ClientController_admin::class, 'destroy'])->name('admin.supprimer_client');


        Route::get('/agents', [AgentController_admin::class, 'agents'])->name('admin.agents');

        Route::get('/agent/{id}', [AgentController_admin::class, 'show'])->name('admin.agent');

        Route::put('/actualiser_agent/{id}', [AgentController_admin::class, 'update'])->name('admin.update_agent');

        Route::get('/ajouter_agent', [AgentController_admin::class, 'create'])->name('admin.ajouter_agent');

        Route::post('/enregistrer_agent', [AgentController_admin::class, 'store'])->name('admin.enregistrer_agent');

        Route::get('/supprimer_agent/{id}', [AgentController_admin::class, 'destroy'])->name('admin.supprimer_agent');


        Route::get('/admins', [AdminController_admin::class, 'admins'])->name('admin.admins');

        Route::get('/admin/{id}', [AdminController_admin::class, 'show'])->name('admin.admin');

        Route::put('/actualiser_admin/{id}', [AdminController_admin::class, 'update'])->name('admin.update_admin');

        Route::get('/ajouter_admin', [AdminController_admin::class, 'create'])->name('admin.ajouter_admin');

        Route::post('/enregistrer_admin', [AdminController_admin::class, 'store'])->name('admin.enregistrer_admin');

        Route::get('/supprimer_admin/{id}', [AdminController_admin::class, 'destroy'])->name('admin.supprimer_admin');



        Route::get('/statuts', [StatutController::class, 'statuts'])->name('admin.statuts');

        Route::get('/ajouter_statuts', [StatutController::class, 'create'])->name('admin.ajouter_statuts');

        Route::get('/priorites', [PrioriteController::class, 'priorites'])->name('admin.priorites');

        Route::get('/ajouter_priorite', [PrioriteController::class, 'create'])->name('admin.ajouter_priorite');

        Route::get('/categories', [CategorieController::class, 'categories'])->name('admin.categories');

        Route::get('/ajouter_categorie', [CategorieController::class, 'create'])->name('admin.ajouter_categorie');

        Route::post('/enregistrer_categorie', [CategorieController::class, 'store'])->name('admin.enregistrer_categorie');

        Route::get('/modifier_categorie/{id}', [CategorieController::class, 'edit'])->name('admin.modifier_categorie');

        Route::put('/actualiser_categorie/{id}', [CategorieController::class, 'update'])->name('admin.update_categorie');

        Route::get('/supprimer_categorie/{id}', [CategorieController::class, 'destroy'])->name('admin.supprimer_categorie');
    });
});

Route::group(['middleware' => 'agent'], function () {
    // Route d'agent
    Route::prefix('agent')->group(function () {

        Route::get('/dashboard', [TicketController_agent::class, 'index'])->name('agent.index');

        Route::get('/profil', [ProfilController_agent::class, 'index'])->name('agent.profil');

        Route::get('/tickets', [TicketController_agent::class, 'tickets'])->name('agent.tickets');

        Route::get('/tickets_specifiques', [TicketController_agent::class, 'tickets_specifiques'])->name('agent.tickets_specifiques');

        Route::get('/ticket', [TicketController_agent::class, 'show'])->name('agent.ticket');

        Route::get('/creer_ticket', [TicketController_agent::class, 'create'])->name('agent.creer_ticket');

        Route::get('/modifier_ticket', [TicketController_agent::class, 'edit'])->name('agent.modifier_ticket');


        // Route::get('/clients', [ClientController_agent::class, 'clients'])->name('agent.clients');

        Route::get('/ajouter_client', [ClientController_agent::class, 'create'])->name('agent.ajouter_client');


        // Route::get('/statuts', [StatutController::class, 'statuts'])->name('agent.statuts');

        // Route::get('/ajouter_statuts', [StatutController::class, 'create'])->name('agent.ajouter_statuts');

        // Route::get('/priorites', [PrioriteController::class, 'priorites'])->name('agent.priorites');

        // Route::get('/ajouter_priorite', [PrioriteController::class, 'create'])->name('agent.ajouter_priorite');

        // Route::get('/categories', [CategorieController::class, 'categories'])->name('agent.categories');

        // Route::get('/ajouter_categorie', [CategorieController::class, 'create'])->name('agent.ajouter_categorie');
    });
});

// Route du client
Route::group(['middleware' => 'client'], function () {
    Route::prefix('client')->group(function () {

        Route::get('/dashboard', [TicketController::class, 'index'])->name('client.index');

        Route::get('/profil', [ProfilController::class, 'index'])->name('client.profil');

        Route::put('/profil/modifier', [ProfilController::class, 'update'])->name('client.update_profil');

        Route::get('/tickets', [TicketController::class, 'tickets'])->name('client.tickets');

        Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('client.ticket');

        Route::get('/creer_ticket', [TicketController::class, 'create'])->name('client.creer_ticket');

        Route::get('/tickets_specifiques/{id}', [TicketController::class, 'tickets_specifiques'])->name('client.tickets_specifiques');

        Route::post('/enregistrer_ticket', [TicketController::class, 'store'])->name('client.enregistrer_ticket');

        Route::post('/ajouter_jointures/{id}', [TicketController::class, 'ajouter_jointures'])->name('client.ajouter_jointures');

        Route::get('/modifier_ticket/{id}', [TicketController::class, 'edit'])->name('client.modifier_ticket');

        Route::put('/actualiser_ticket/{id}', [TicketController::class, 'update'])->name('client.update_ticket');

        Route::get('/supprimer_ticket/{id}', [TicketController::class, 'destroy'])->name('client.supprimer_ticket');

        Route::post('/creer_commentaire/{id}', [TicketController::class, 'createCommentaire'])->name('client.creer_commentaire');


        Route::get('/statuts', [StatutController::class, 'statuts'])->name('client.statuts');

        Route::get('/ajouter_statuts', [StatutController::class, 'create'])->name('client.ajouter_statuts');

        Route::get('/priorites', [PrioriteController::class, 'priorites'])->name('client.priorites');

        Route::get('/ajouter_priorite', [PrioriteController::class, 'create'])->name('client.ajouter_priorite');
    });
});

//Auth Routes
Route::get('login/{entreprise_URL}', [AuthController::class, 'login'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');

Route::get('registration/{entreprise_URL}', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');

Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
