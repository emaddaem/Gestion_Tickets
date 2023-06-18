@extends('base')
@section('title', 'Tickets par priorité')
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
    <h2 class="my-3">Liste des tickets</h2>

    @if($nom_priorite)
    <h4>priorite : <strong>{{$nom_priorite}}</strong></h4>
    @else
    <h4>priorite : <strong>Non assigné</strong></h4>
    @endif

    <div class="creer-ticket">
        <a href="{{route('agent.creer_ticket')}}" class="btn btn-success mt-2">Créer un ticket</a>
    </div>

    <div class="container mt-3">
        <div class="row">
            @if ($tickets && $tickets->count() > 0)
            <div class="col">
                <table id="productsTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Statut</th>
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
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('agent.ticket', $ticket->id)}}">Afficher</a>
                                        <a class="dropdown-item" href="{{route('agent.modifier_ticket', $ticket->id)}}">Modifier</a>
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