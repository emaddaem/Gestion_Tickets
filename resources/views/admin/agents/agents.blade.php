@extends('base')
@section('title', 'Liste des agents')
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

    <h2 class="mt-3">Liste des agents</h2>

    <div class="creer-ticket">
        <a href="{{route('admin.ajouter_agent')}}" class="btn btn-success mt-2">
            Ajouter un agent
        </a>
    </div>

    <h6 class="my-2"><strong>Nombre total :</strong> {{$agents->count()}}</h6>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Crée a</th>
                            <th>Mise a jour a</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($agents && $agents->count() > 0)
                        @foreach($agents as $agent)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$agent->nom}}</td>
                            <td>{{$agent->prenom}}</td>
                            <td>{{$agent->telephone}}</td>
                            <td>{{$agent->email}}</td>
                            <td>{{$agent->created_at}}</td>
                            <td>{{$agent->updated_at}}</td>
                            <td>
                                <a href="{{route('admin.agent', $agent->id)}}" class="btn-sm">
                                    <i class="fa fa-eye fa-lg"></i>
                                </a>

                                <a href="{{route('admin.supprimer_agent', $agent->id)}}" class="btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <a href="{{route('admin.rendre_admin', $agent->id)}}" class="btn btn-primary btn-sm">
                                    Rendre admin
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection