@extends('base')
@section('title', 'Tableau de board')
@section('content')

<style>
    .move-right {
        text-align: right;
    }

    .creer-ticket {
        text-align: right;
    }

    .card-body a {
        text-decoration: none;
    }
</style>

@include('includes.success')
@include('includes.errors')

<div class="container">
    <h3 class="mt-5"><strong>Tableau de board</strong></h3>

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="{{route('admin.tickets_specifiques')}}">
                        <h5 class="card-title">Nouveaux tickets</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="{{route('admin.tickets_specifiques')}}">
                        <h5 class="card-title">Tickets non assignés</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="{{route('admin.tickets_specifiques')}}">
                        <h5 class="card-title">Tickets en attente</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="{{route('admin.tickets_specifiques')}}">
                        <h5 class="card-title">Tickets résolus</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

    </div>

    <h2 class="mt-5">Liste des tickets</h2>

    <div class="creer-ticket">
        <a href="/admin/creer_ticket" class="btn btn-success mt-2">Créer un ticket</a>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>Id</th>
                            <th>Sujet</th>
                            <th>Description</th>
                            <th>Priorité</th>
                            <th>Status</th>
                            <th>Agent assigné</th>
                            <th>Créé à</th>
                            <th>Mise à jour à</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ticket 1</td>
                            <td>Description de la première ticket</td>
                            <td>Moyenne</td>
                            <td>En attente</td>
                            <td>Agent 1</td>
                            <td>05/05/2023</td>
                            <td>05/05/2023</td>
                            <td>
                                <a href="{{route('admin.ticket')}}" class="btn-sm"><i class="fas fa-eye fa-lg"></i></a>

                                <a href="{{route('admin.modifier_ticket')}}" class="btn-sm"><i class="fas fa-edit fa-lg"></i></a>

                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    <a href="#" class="btn-sm" onclick="document.forms[0].submit()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection