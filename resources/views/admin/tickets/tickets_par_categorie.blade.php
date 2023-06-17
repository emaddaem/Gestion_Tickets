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
    <h4>Ctégorie : <strong>{{$categorie->nom}}</strong></h4>

    <div class="creer-ticket">
        <a href="{{route('admin.creer_ticket')}}" class="btn btn-success mt-2">Créer un ticket</a>
    </div>

    <div class="container mb-7">
        <h6 class="my-2"><strong>Nombre total :</strong> {{$tickets->count()}}</h6><br>
        <div class="row">
            @if ($tickets && $tickets->count() > 0)
            <div class="col">
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
                                    {{$ticket->agent ? $ticket->agent->nom : '-'}}
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