@extends('base')
@section('title', 'Tableau de bord')
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

<div class="container my-5">
    @include('includes.success')
    @include('includes.errors')

    <h3><strong>Tableau de bord</strong></h3>
    <div class="row mt-4">
        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
                <div class="card-body">
                    <a href="{{route('admin.tickets_specifiques', $statuts_data['id_statut_nouveau'])}}">
                        <h5 class="card-title">Nouveaux tickets</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>{{$statuts_data['nombreNouveauxTickets']}}</strong></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
                <div class="card-body">
                    <a href="{{route('admin.tickets_specifiques', $statuts_data['id_statut_traitement'])}}">
                        <h5 class="card-title">Tickets en cours de traitement</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>{{$statuts_data['nombreTicketsTraitement']}}</strong></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
                <div class="card-body">
                    <a href="{{route('admin.tickets_specifiques', $statuts_data['id_statut_attente'])}}">
                        <h5 class="card-title">Tickets en attente</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>{{$statuts_data['nombreTicketsattente']}}</strong></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
                <div class="card-body">
                    <a href="{{route('admin.tickets_specifiques', $statuts_data['id_statut_resolu'])}}">
                        <h5 class="card-title">Tickets résolus</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>{{$statuts_data['nombreTicketsResolus']}}</strong></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
                <div class="card-body">
                    <a href="{{route('admin.tickets_specifiques', 0)}}">
                        <h5 class="card-title">Tickets non assignés</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>{{$statuts_data['nombreTicketsNonAssignés']}}</strong></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 my-2">
        </div>

        <!-- <div class="col-md-3 my-2">
        </div> -->

        <div class="col-md-6 my-2">
            <form action="{{ route('admin.tickets_par_categorie') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="categorie">Chercher par catégorie</label>
                    <select class="js-example-basic-multiple form-control border-info" name="categorie" id="categorie">
                        <option value="">Sélectionnez la catégorie</option>
                        @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-sm">Afficher</button>
                </div>
            </form>
        </div>
    </div>

    <h2 class="my-3">Liste des tickets d'aujourd'hui</h2>

    <div class="creer-ticket">
        <a href="{{route('admin.creer_ticket')}}" class="btn btn-success mt-2">Créer un ticket</a>
    </div>

    <div class="row my-3">
        @if ($tickets && $tickets->count() > 0)
        <div class="container col-lg-11 mb-7">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
                <thead>
                    <tr>
                        <td>Id</td>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Statut</th>
                        <th>Priorité</th>
                        <th>Agent</th>
                        <th>Client</th>
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
                        <td class="text-center">{{$ticket->priorite ? $ticket->priorite->nom : '-'}}</td>
                        <td class="text-center">
                            @if($ticket->agent)
                            <a href="{{route('admin.agent', $ticket->agent->id)}}" style="text-decoration: none; color: inherit;">
                                {{$ticket->agent->nom}}
                            </a>
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.client', $ticket->user->id)}}" style="text-decoration: none; color: inherit;">
                                {{$ticket->user->nom}} {{$ticket->user->prenom}}
                            </a>
                        </td>
                        <td>{{$ticket->created_at->format('d-m-y')}}</td>
                        <td>{{$ticket->updated_at->format('d-m-y')}}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('admin.ticket', $ticket->id)}}">Afficher</a>
                                    <a class="dropdown-item" href="{{route('admin.modifier_ticket', $ticket->id)}}">Modifier</a>
                                    <a class="dropdown-item" href="{{route('admin.supprimer_ticket', $ticket->id)}}">Supprimer</a>
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
</div>
@endsection