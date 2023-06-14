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

<div class="container">
    <h3 class="mt-5"><strong>Tableau de board</strong></h3>

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="{{route('agent.tickets_specifiques')}}">
                        <h5 class="card-title">Nouveaux tickets</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="{{route('agent.tickets_specifiques')}}">
                        <h5 class="card-title">Tickets non assignés</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="{{route('agent.tickets_specifiques')}}">
                        <h5 class="card-title">Tickets en attente</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="{{route('agent.tickets_specifiques')}}">
                        <h5 class="card-title">Tickets résolus</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

    </div>

    <h2 class="mt-5">Liste des tickets</h2>

    <div class="creer-ticket">
        <a href="/agent/creer_ticket" class="btn btn-success mt-2">Créer un ticket</a>
    </div>

    <div class="row my-3">
        @if ($tickets && $tickets->count() > 0)
        <div class="container col-lg-11">
            <div class="creer-ticket">
                <a href="{{route('agent.creer_ticket')}}" class="btn btn-success mt-2">Créer un ticket</a>
            </div>
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Status</th>
                        <th>Priorité</th>
                        <th>Client concerné</th>
                        <th>Créé à</th>
                        <th>Mise à jour à</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{$ticket->titre}}</td>
                        <td>{{$ticket->categorie->nom}}</td>
                        <td>{{$ticket->statut ? $ticket->statut->nom : 'Pas encore défini'}}</td>
                        <td>{{$ticket->priorite ? $ticket->priorite->nom : 'Pas encore défini'}}</td>
                        <td>{{$ticket->user->nom}}</td>
                        <td>{{$ticket->created_at->format('d-m-Y H:i')}}</td>
                        <td>{{$ticket->updated_at->format('d-m-Y H:i')}}</td>
                        <td>
                            <a href="{{route('agent.ticket', $ticket->id)}}" class="btn-sm">
                                <i class="fa fa-eye fa-lg"></i>
                            </a>

                            <a href="{{route('agent.modifier_ticket', $ticket->id)}}" class="btn-sm">
                                <i class="fa fa-edit fa-lg"></i>
                            </a>

                            <a href="{{route('agent.supprimer_ticket', $ticket->id)}}" class="btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection