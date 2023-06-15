@extends('base')
@section('title', 'Liste des admins')
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
    <h2 class="mt-3">Liste des admins</h2>

    <div class="creer-ticket">
        <a href="{{route('admin.ajouter_admin')}}" class="btn btn-success mt-2">
            Ajouter un admin
        </a>
    </div>

    <h6 class="my-2"><strong>Nombre total :</strong> {{$admins->count()}}</h6>

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
                        @if($admins && $admins->count() > 0)
                        @foreach($admins as $admin)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$admin->nom}}</td>
                            <td>{{$admin->prenom}}</td>
                            <td>{{$admin->telephone}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->created_at}}</td>
                            <td>{{$admin->updated_at}}</td>
                            <td>
                                <a href="{{route('admin.admin', $admin->id)}}" class="btn-sm">
                                    <i class="fa fa-eye fa-lg"></i>
                                </a>

                                <a href="{{route('admin.supprimer_admin', $admin->id)}}" class="btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <a href="{{route('admin.rendre_agent', $admin->id)}}" class="btn btn-primary btn-sm">
                                    Rendre agent
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