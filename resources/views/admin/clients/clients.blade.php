    @extends('base')
    @section('title', 'Liste des clients')
    @section('content')

    <style>
        .move-right {
            text-align: right;
        }

        .creer-ticket {
            text-align: right;
        }
    </style>

    @include('includes.success')
    @include('includes.errors')

    <div class="container mt-5">
        <h2 class="mt-3">Liste des clients</h2>

        <div class="creer-ticket">
            <a href="{{route('admin.ajouter_client')}}" class="btn btn-success mt-2">
                Ajouter un client
            </a>
        </div>

        <h6 class="my-2"><strong>Nombre total :</strong> {{$clients->count()}}</h6>


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
                                <th>Créé à</th>
                                <th>Mise à jour à</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($clients && $clients->count() > 0)
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{$client->nom}}</td>
                                <td>{{$client->prenom}}</td>
                                <td>{{$client->telephone}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->created_at}}</td>
                                <td>{{$client->updated_at}}</td>
                                <td>
                                    <a href="{{route('admin.client', $client->id)}}" class="btn-sm">
                                        <i class="fa fa-eye fa-lg"></i>
                                    </a>

                                    <a href="{{route('admin.supprimer_client', $client->id)}}" class="btn-sm">
                                        <i class="fa fa-trash"></i>
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