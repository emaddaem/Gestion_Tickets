@extends('base')
@section('title', 'Page du client')
@section('content')

<style>
    .move-right {
        text-align: right;
    }

    .card-body a {
        text-decoration: none;
    }
</style>

@include('includes.success')
@include('includes.errors')

<div class="container col-lg-7 my-5">

    <h2 class="text text-center">Informations sur le client</h2>

    <div class="row">
        <form action="{{ route('admin.update_client', $client->id) }}" method="post" id="entreprise" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Nom de l'entreprise:</label>
                <input class="form-control" value="{{$client->entreprise->nom}}" disabled>
                <!-- <p>{{$client->entreprise->nom}}</p> -->
            </div>
            <div class="form-group mb-3">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="{{$client->prenom}}" placeholder="Saisissez votre prénom" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" name="nom" id="nom" value="{{$client->nom}}" placeholder="Saisissez votre nom" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="email">Adresse e-mail:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$client->email}}" placeholder="Saisissez l'email" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="telephone">Téléphone:</label>
                <input type="text" class="form-control" name="telephone" id="telephone" value="{{$client->telephone}}" placeholder="Saisissez le numéro de téléphone" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" name="adresse" id="adresse" value="{{$client->adresse}}" placeholder="Saisissez l'adresse" disabled>
            </div>

            <div class="my-3" id="div-changement-mot-de-passe" style="display:none">
                <h4>Changer le mot de passe</h4>
                <div class="form-group mb-3">
                    <label for="password">Nouveau mot de passe :</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Saisissez votre nouveau mot de passe" disabled>
                </div>
            </div>

            <button type="button" class="btn btn-primary mt-3" id="btn-changer-mot-de-passe" onclick="activerChangementMotDePasse()">Changer le mot de passe</button>
            <button type="button" class="btn btn-primary mt-3" id="modifier" onclick="activerChamps('entreprise')">Modifier</button>
            <input type="submit" class="btn btn-success mt-3" id="enregistrer" value="Enregistrer" disabled>

        </form>
    </div>
</div>

<div class="container my-5 col-lg-9">
    <h3>Tickets du client :</h3>

    @if($client->tickets && $client->tickets->count() > 0)
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Status</th>
                <th>Priorité</th>
                <th>Agent assigné</th>
                <th>Créé à</th>
                <th>Mise à jour à</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($client->tickets as $ticket)
            <tr>
                <td>1</td>
                <td>{{$ticket->titre}}</td>
                <td>{{$ticket->categorie->nom}}</td>
                <td>{{$ticket->statut ? $ticket->statut->nom : 'Pas encore défini'}}</td>
                <td>{{$ticket->priorite ? $ticket->priorite->nom : 'Pas encore défini'}}</td>
                <td>{{$ticket->agent ? $ticket->agent->nom : 'Pas encore assigné'}}</td>
                <td>{{$ticket->created_at->format('d-m-Y H:i')}}</td>
                <td>{{$ticket->updated_at->format('d-m-Y H:i')}}</td>
                <td>
                    <a href="{{route('admin.ticket', $ticket->id)}}" class="btn-sm">
                        <i class="fa fa-eye fa-lg"></i>
                    </a>

                    <a href="{{route('admin.modifier_ticket', $ticket->id)}}" class="btn-sm">
                        <i class="fa fa-edit fa-lg"></i>
                    </a>

                    <a href="{{route('admin.supprimer_ticket', $ticket->id)}}" class="btn-sm">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h4 class="text text-center"><strong>Pas de tickets</strong></h4>
    @endif

</div>

@endsection