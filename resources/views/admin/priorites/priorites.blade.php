@extends('base')
@section('title', 'Liste des priorités')
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
    <h2 class="mt-3">Liste des priorités</h2>

    <div class="creer-ticket">
        <a href="{{route('admin.ajouter_priorite')}}" class="btn btn-success mt-2">Ajouter une priorité</a>
    </div>

    <div class="container mt-3">
        <div class="row">
            @if ($priorites && $priorites->count() > 0)
            <div class="col">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Créée à</th>
                            <th>Mise à jour à</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($priorites as $priorite)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$priorite->nom}}</td>
                            <td>{{$priorite->created_at}}</td>
                            <td>{{$priorite->updated_at}}</td>
                            <td>
                                <a href="{{route('admin.modifier_priorite', $priorite->id)}}" class="btn-sm"><i class="fas fa-edit fa-lg"></i></a>

                                <a href="{{route('admin.supprimer_priorite', $priorite->id)}}" class="btn-sm">
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