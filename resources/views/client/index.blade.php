@extends('base')
@section('title', 'Page d\'acceuil')
@section('content')

<style>
    .move-right {
        text-align: right;
    }

    .card-body a {
        text-decoration: none;
    }
</style>

@include('includes.success')
@include('includes.errors')

<div class="container my-5">
    <h3 class="mt-5"><strong>Tableau de board</strong></h3>

    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="/tickets_specifiques">
                        <h5 class="card-title">Tickets non résolus</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3"></div>
        <div class="col-md-3"></div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="/tickets_specifiques">
                        <h5 class="card-title">Tickets résolus</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mt-5 mb-4"><strong>Mes tickets</strong></h4>

    <div class="container mt-3">
        <div class="row">
            @if ($tickets && $tickets->count() > 0)
            <div class="col">
                <table class="table table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>Id</th>
                            <th>Sujet</th>
                            <th>Catégorie</th>
                            <th>Statut</th>
                            <th>Agent assigné</th>
                            <th>Créé a</th>
                            <th>Mise a jour a</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>111</td>
                            <td>{{$ticket->titre}}</td>
                            <td>{{$ticket->categorie->nom}}</td>
                            <td>{{$ticket->statut ? $ticket->statut->nom : 'Pas encore défini'}}</td>
                            <td>{{$ticket->agent ? $ticket->agent->nom : 'Pas encore assigné'}}</td>
                            <td>{{$ticket->created_at}}</td>
                            <td>{{$ticket->updated_at}}</td>
                            <td>
                                <a href="{{route('client.ticket', $ticket->id)}}" class="btn-sm">
                                    <i class="fa fa-eye fa-lg"></i>
                                </a>

                                <a href="{{route('client.modifier_ticket', $ticket->id)}}" class="btn-sm">
                                    <i class="fa fa-edit fa-lg"></i>
                                </a>

                                <a href="{{route('client.supprimer_ticket', $ticket->id)}}" class="btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection