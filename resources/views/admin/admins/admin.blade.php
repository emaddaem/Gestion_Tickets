@extends('base')
@section('title', 'Afficher un admin')
@section('content')

<style>
    .move-right {
        text-align: right;
    }

    .card-body a {
        text-decoration: none;
    }
</style>

<div class="container col-lg-7 my-5">
    @include('includes.success')
    @include('includes.errors')
    
    <h2 class="text text-center">Informations sur le admin</h2>

    <form action="{{ route('admin.update_admin', $admin->id) }}" method="post" id="entreprise" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nom de l'entreprise:</label>
            <input class="form-control" value="{{$admin->entreprise->nom}}" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" name="prenom" id="prenom" value="{{$admin->prenom}}" placeholder="Saisissez votre prénom" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" name="nom" id="nom" value="{{$admin->nom}}" placeholder="Saisissez votre nom" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="email">Adresse e-mail:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$admin->email}}" placeholder="Saisissez l'email" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="telephone">Téléphone:</label>
            <input type="text" class="form-control" name="telephone" id="telephone" value="{{$admin->telephone}}" placeholder="Saisissez le numéro de téléphone" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="adresse">Adresse:</label>
            <input type="text" class="form-control" name="adresse" id="adresse" value="{{$admin->adresse}}" placeholder="Saisissez l'adresse" disabled>
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
@endsection