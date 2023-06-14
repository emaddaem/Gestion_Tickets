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

    <h2>Mes tickets récentes :</h2>

    <!-- <div class="container"> -->
    <div class="row my-4">
        @if ($tickets && $tickets->count() > 0)
        <div class="container col-lg-11">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
                <thead>
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
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{$ticket->titre}}</td>
                        <td>{{$ticket->categorie->nom}}</td>
                        <td>{{$ticket->statut ? $ticket->statut->nom : 'Pas encore défini'}}</td>
                        <td>{{$ticket->agent ? $ticket->agent->nom : 'Pas encore assigné'}}</td>
                        <td>{{$ticket->created_at->format('d-m-Y H:i')}}</td>
                        <td>{{$ticket->updated_at->format('d-m-Y H:i')}}</td>
                        <td>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('client.ticket', $ticket->id)}}">Afficher</a>
                                    <a class="dropdown-item" href="{{route('client.modifier_ticket', $ticket->id)}}">Modifier</a>
                                    <a class="dropdown-item" href="{{route('client.supprimer_ticket', $ticket->id)}}">Supprimer</a>
                                </div>
                            </div>
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