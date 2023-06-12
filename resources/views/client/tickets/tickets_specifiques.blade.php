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

<div class="container mt-3">
    <h2 class="mt-3">Liste des tickets</h2>
    <h4>Statut : <strong>{{$nom_statut}}</strong></h4>

    <div class="creer-ticket">
        <a href="{{route('client.creer_ticket')}}" class="btn btn-success mt-2">Créer un ticket</a>
    </div>
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
    </div>
</div>
@endsection