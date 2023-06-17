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

<div style="margin-top: 40px;">
    <h4 class="text text-center">Bienvenue dans l'espace de support chez <strong>{{ auth()->user()->entreprise->nom }}</strong></h4>
</div>

<div class="container my-3">
    @include('includes.success')
    @include('includes.errors')

    <h3><strong>Tableau de board</strong></h3>

    <div class="row mt-4 mb-5">
        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
                <div class="card-body">
                    <a href="{{route('client.tickets_specifiques', $id_statut_nouveau)}}">
                        <h5 class="card-title">Nouveaux tickets</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>{{$nombreNouveauxTickets}}</strong></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 my-2"></div>
        <div class="col-md-3 my-2"></div>

        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
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
                        <th>Agent</th>
                        <th>Créé</th>
                        <th>MàJ</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td style="font-size: 14px;">{{$ticket->titre}}</td>
                        <td>{{$ticket->categorie->nom}}</td>
                        <td class="text-center">{{$ticket->statut ? $ticket->statut->nom : '-'}}</td>
                        <td>{{$ticket->agent ? $ticket->agent->nom : '-'}}</td>
                        <td>{{$ticket->created_at->format('d-m-y')}}</td>
                        <td>{{$ticket->updated_at->format('d-m-y')}}</td>
                        <td class="text-center">
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