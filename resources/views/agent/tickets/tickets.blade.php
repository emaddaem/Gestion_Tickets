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


<div class="container mt-5">
    @include('includes.success')
    @include('includes.errors')

    <h2 class="mt-3">Liste des tickets</h2>

    <div class="creer-ticket">
        <a href="{{route('agent.creer_ticket')}}" class="btn btn-success mt-2">Créer un ticket</a>
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
                            <th>Statut</th>
                            <th>Priorité</th>
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
                            <td class="text-center">{{$ticket->statut ? $ticket->statut->nom : 'Pas encore défini'}}</td>
                            <td class="text-center">{{$ticket->priorite ? $ticket->priorite->nom : 'Pas encore défini'}}</td>
                            <td>{{$ticket->user->nom}}</td>
                            <td>{{$ticket->created_at->format('d-m-y')}}</td>
                            <td>{{$ticket->updated_at->format('d-m-y')}}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('agent.ticket', $ticket->id)}}">Afficher</a>
                                        <a class="dropdown-item" href="{{route('agent.modifier_ticket', $ticket->id)}}">Modifier</a>
                                        <a class="dropdown-item" href="{{route('agent.fermer_ticket', $ticket->id)}}">Fermer</a>
                                        <a class="dropdown-item" href="{{route('agent.supprimer_ticket', $ticket->id)}}">Supprimer</a>
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