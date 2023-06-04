<head>
    <title>Page de profil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .move-right {
            text-align: right;
        }

        .card-body a {
            text-decoration: none;
        }
    </style>
</head>

@include('includes.navbar')
<div class="container my-5">

    <h1 class="text text-center">Page de profil</h1>

    <h4 class="mt-5"><strong>Informations sur l'entreprise</strong></h4>

    <form action="" method="post" id="entreprise" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="nom" id="nom" value="Nom 1" placeholder="Saisissez le nom de l'entreprise" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" disabled></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="email">Adresse e-mail:</label>
            <input type="email" class="form-control" name="email" id="email" value="email" placeholder="Saisissez l'email" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="telephone">Téléphone:</label>
            <input type="text" class="form-control" name="telephone" id="telephone" value="tel" placeholder="Saisissez le numéro de téléphone" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="adresse">Adresse:</label>
            <input type="text" class="form-control" name="adresse" id="adresse" value="Adresse" placeholder="Saisissez l'adresse" disabled>
        </div>
        <button type="button" class="btn btn-primary mt-3" id="modifier" onclick="activerChamps('entreprise')">Modifier</button>
        <input type="submit" class="btn btn-success mt-3" id="enregistrer" value="Enregistrer" disabled>
    </form>

    <h4 class="mt-5"><strong>Informations sur l'admin</strong></h4>

    <form action="" method="post" id="admin" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" name="nom" id="nom" value="Nom 1" placeholder="Saisissez votre nom" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" name="prenom" id="prenom" value="prenom" placeholder="Saisissez votre prénom" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="email" placeholder="Saisissez votre email" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="telephone">Téléphone:</label>
            <input type="text" class="form-control" name="telephone" id="telephone" value="tel" placeholder="Saisissez votre numéro de téléphone" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="ville">Ville:</label>
            <input type="text" class="form-control" name="ville" id="ville" value="ville" placeholder="Saisissez votre ville" disabled>
        </div>
        <div class="form-group mb-3" id="div-changement-mot-de-passe" style="display:none">
            <label for="actual_password">Mot de passe actuel :</label>
            <input type="password" class="form-control" name="actual_password" id="actual_password" placeholder="Saisissez votre mot de passe actuel" disabled>
            <label for="password">Nouveau mot de passe :</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Saisissez votre nouveau mot de passe" disabled>
            <label for="password_confirmation">Confirmer le mot de passe :</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Saisissez votre nouveau mot de passe à nouveau" disabled>
        </div>
        <div>
            <button type="button" class="btn btn-primary mt-3" id="btn-changer-mot-de-passe" onclick="activerChangementMotDePasse()">Changer le mot de passe</button>
            <button type="button" class="btn btn-primary mt-3" id="modifier" onclick="activerChamps('admin')">Modifier</button>
            <input type="submit" class="btn btn-success mt-3" id="enregistrer" value="Enregistrer" disabled>
        </div>
    </form>

    <div class="row mt-5">

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="/tickets_specifiques">
                        <h5 class="card-title">Nombres de clients</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="/tickets_specifiques">
                        <h5 class="card-title">Nombres d'agents</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="/tickets_specifiques">
                        <h5 class="card-title">Autre</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="/tickets_specifiques">
                        <h5 class="card-title">Autre</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

    </div>
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