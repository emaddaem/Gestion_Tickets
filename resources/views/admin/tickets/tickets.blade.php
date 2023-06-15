@extends('base')
@section('title', 'Liste des tickets')
@section('content')

<style>
    .move-right {
        text-align: right;
    }

    .creer-ticket {
        text-align: right;
    }
</style>


<div class="container my-5">
    @include('includes.success')
    @include('includes.errors')

    <h2>Liste des tickets</h2>

    <div class="creer-ticket">
        <a href="{{route('admin.creer_ticket')}}" class="btn btn-success mt-2">Créer un ticket</a>
    </div>

    <div class="container my-3">
        <div class="row">
            <h6 class="my-2"><strong>Nombre total :</strong> {{$tickets->count()}}</h6>
            @if ($tickets && $tickets->count() > 0)
            <div class="col">
                <table id="productsTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Status</th>
                            <th>Priorité</th>
                            <th>Agent assigné</th>
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
                            <td>
                                @if($ticket->agent)
                                <a href="{{route('admin.agent', $ticket->agent->id)}}" style="text-decoration: none; color: inherit;">
                                    {{$ticket->agent ? $ticket->agent->nom : 'Pas encore assigné'}}
                                </a>
                                @else
                                Pas encore assigné
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.client', $ticket->user->id)}}" style="text-decoration: none; color: inherit;">
                                    {{$ticket->user->nom}} {{$ticket->user->prenom}}
                                </a>
                            </td>
                            <td>{{$ticket->created_at->format('d-m-Y H:i')}}</td>
                            <td>{{$ticket->updated_at->format('d-m-Y H:i')}}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('admin.ticket', $ticket->id)}}">Afficher</a>
                                        <a class="dropdown-item" href="{{route('admin.modifier_ticket', $ticket->id)}}">Modifier</a>
                                        <a class="dropdown-item" href="{{route('admin.fermer_ticket', $ticket->id)}}">Fermer</a>
                                        <a class="dropdown-item" href="{{route('admin.supprimer_ticket', $ticket->id)}}">Supprimer</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <h4 class="text text-center">Aucun résultat trouvé</h4>
            @endif
        </div>
    </div>
</div>

@endsection