@extends('base')
@section('title', 'Liste des statuts')
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
    <h2 class="mt-3">Liste des statuts</h2>

    <div class="creer-ticket">
        <a href="{{route('agent.ajouter_statut')}}" class="btn btn-success mt-2">Ajouter un statut</a>
    </div>

    <div class="container mt-3">
        <div class="row">
            @if ($statuts && $statuts->count() > 0)
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
                        @foreach ($statuts as $statut)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$statut->nom}}</td>
                            <td>{{$statut->created_at ? $statut->created_at->format('d-m-y') : null}}</td>
                            <td>{{$statut->updated_at ? $statut->updated_at->format('d-m-y') : null}}</td>
                            <td>
                                @if($statut && $statut->user_id !== null)
                                <a href="{{route('admin.modifier_statut', $statut->id)}}" class="btn-sm"><i class="fas fa-edit fa-lg"></i></a>

                                <a href="{{route('admin.supprimer_statut', $statut->id)}}" class="btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @endif
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