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

<div class="container">
    <h3><strong>Tableau de board</strong></h3>

    <div class="row mt-4 mb-5">
        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="{{route('client.tickets_specifiques', $id_statut_nouveau)}}">
                        <h5 class="card-title">Nouveaux tickets</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>{{$nombreNouveauxTickets}}</strong></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3"></div>
        <div class="col-md-3"></div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="{{route('client.tickets_specifiques', $id_statut_resolu)}}">
                        <h5 class="card-title">Tickets résolus</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>{{$nombreTicketsResolus}}</strong></h5>
                </div>
            </div>
        </div>
    </div>

    <h4><strong>Mes tickets récentes :</strong></h4>

    <!-- <div class="container"> -->
    <div class="row my-4">
        @if ($tickets && $tickets->count() > 0)
        <div class="container col-lg-11">
            <table class="table table-striped">
                <thead class="bg-light">
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
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
                        <td>{{$ticket->created_at->format('d-m-Y H:i')}}</td>
                        <td>{{$ticket->updated_at->format('d-m-Y H:i')}}</td>
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
    <!-- </div> -->
</div>

@endsection