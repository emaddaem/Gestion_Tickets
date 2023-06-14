@extends('base')
@section('title', 'Page de profil')
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

<div class="container col-lg-8 my-5">

    <h1 class="text text-center">Page de profil</h1>

    <form action="{{ route('client.update_profil') }}" method="post" id="entreprise" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nom de l'entreprise:</label>
            <input class="form-control" value="{{$user->entreprise->nom}}" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" name="prenom" id="prenom" value="{{$user->prenom}}" placeholder="Saisissez votre prénom" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" name="nom" id="nom" value="{{$user->nom}}" placeholder="Saisissez votre nom" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="email">Adresse e-mail:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="Saisissez l'email" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="telephone">Téléphone:</label>
            <input type="text" class="form-control" name="telephone" id="telephone" value="{{$user->telephone}}" placeholder="Saisissez le numéro de téléphone" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="adresse">Adresse:</label>
            <input type="text" class="form-control" name="adresse" id="adresse" value="{{$user->adresse}}" placeholder="Saisissez l'adresse" disabled>
        </div>

        <div class="my-3" id="div-changement-mot-de-passe" style="display:none">
            <h4>Changer le mot de passe</h4>
            <div class="form-group mb-3">
                <label for="actual_password">Mot de passe actuel :</label>
                <input type="password" class="form-control" name="actual_password" id="actual_password" placeholder="Saisissez votre mot de passe actuel" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="password">Nouveau mot de passe :</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Saisissez votre nouveau mot de passe" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation">Confirmer le mot de passe :</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Saisissez votre nouveau mot de passe à nouveau" disabled>
            </div>
        </div>

        <button type="button" class="btn btn-primary mt-3" id="btn-changer-mot-de-passe" onclick="activerChangementMotDePasse()">Changer le mot de passe</button>
        <button type="button" class="btn btn-primary mt-3" id="modifier" onclick="activerChamps('entreprise')">Modifier</button>
        <input type="submit" class="btn btn-success mt-3" id="enregistrer" value="Enregistrer" disabled>

    </form>
</div>

@endsection