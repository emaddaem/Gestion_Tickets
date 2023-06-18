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

<div class="container my-5">
    <div class="row">
        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
                <div class="card-body">
                    <h5 class="card-title">Nombres de clients</h5>
                    <h5 class="card-title move-right"><strong>{{$data_stats['nombreClients']}}</strong></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
                <div class="card-body">
                    <h5 class="card-title">Nombres d'agents</h5>
                    <h5 class="card-title move-right"><strong>{{$data_stats['nombreAgents']}}</strong></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
                <div class="card-body">
                    <h5 class="card-title">Nombre d'admins</h5>
                    <h5 class="card-title move-right"><strong>{{$data_stats['nombreAdmins']}}</strong></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 my-2">
            <div class="card" style="width: 17rem; height: 8rem;">
                <div class="card-body">
                    <h5 class="card-title">Nombre de tickets</h5>
                    <h5 class="card-title move-right"><strong>{{$data_stats['nombreTickets']}}</strong></h5>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="container form-container col-lg-7 my-5">
    @include('includes.success')
    @include('includes.errors')

    <h1 class="text text-center">Page de profil</h1>

    <h4 class="mt-5"><strong>Informations sur l'entreprise</strong></h4>

    <form action="{{ route('entreprise.update_entreprise') }}" method="post" id="entreprise" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="col-lg-4">
            <img src="../images/logo.png" alt="Logo d'entreprise" class="img-thumbnail w-25" onclick="showImage('../images/logo.png')" />
        </div>
        <div class="form-group mb-3">
            <label for="logo">Logo</label>
            <input type="file" class="form-control" name="logo" id="logo" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="nom">Nom de l'entreprise:</label>
            <input type="text" class="form-control" name="nom" id="nom" value="{{$entreprise->nom}}" placeholder="Saisissez le nom de l'entreprise" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" disabled>{{$entreprise->description}}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="email">Adresse e-mail:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$entreprise->email}}" placeholder="Saisissez l'email" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="telephone">Téléphone:</label>
            <input type="text" class="form-control" name="telephone" id="telephone" value="{{$entreprise->telephone}}" placeholder="Saisissez le numéro de téléphone" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="adresse">Adresse:</label>
            <input type="text" class="form-control" name="adresse" id="adresse" value="{{$entreprise->adresse}}" placeholder="Saisissez l'adresse" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="url_personnalisee">URL:</label>
            <input type="text" class="form-control" name="url_personnalisee" id="url_personnalisee" value="{{$entreprise->url_personnalisee}}" placeholder="Saisissez l'URL" disabled>
        </div>
        <button type="button" class="btn btn-primary mt-3" id="modifier" onclick="activerChamps('entreprise')">Modifier</button>
        <input type="submit" class="btn btn-success mt-3" id="enregistrer" value="Enregistrer" disabled>
    </form>

    <h4 class="mt-5"><strong>Informations sur l'admin</strong></h4>

    <form action="{{ route('admin.update_profil') }}" method="post" id="admin" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
        <button type="button" class="btn btn-primary mt-3" id="modifier" onclick="activerChamps('admin')">Modifier</button>
        <input type="submit" class="btn btn-success mt-3" id="enregistrer" value="Enregistrer" disabled>

    </form>
</div>

<script>
    function showImage(src) {
        var modal = document.createElement('div');
        modal.style.position = 'fixed';
        modal.style.top = '0';
        modal.style.left = '0';
        modal.style.width = '100%';
        modal.style.height = '100%';
        modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
        modal.style.zIndex = '999';
        modal.style.display = 'flex';
        modal.style.justifyContent = 'center';
        modal.style.alignItems = 'center';

        var img = document.createElement('img');
        img.src = src;
        img.style.maxWidth = '90%';
        img.style.maxHeight = '90%';
        img.style.objectFit = 'contain';
        modal.appendChild(img);

        document.body.appendChild(modal);

        modal.addEventListener('click', function() {
            modal.parentElement.removeChild(modal);
        });
    }
</script>

<script>
    function activerChamps(form) {
        var champsSaisie = document.querySelectorAll("#" + form + " input[type='text'], #" + form + " input[type='email'], #" + form + " input[type='password'], #" + form + " input[type='submit'], #" + form + " input[type='file'], #" + form + " textarea[name]");

        for (var i = 0; i < champsSaisie.length; i++) {
            champsSaisie[i].removeAttribute("disabled");
        }
    }
</script>

<script>
    function activerChangementMotDePasse() {
        document.getElementById('div-changement-mot-de-passe').style.display = 'block';
    }
</script>

@endsection