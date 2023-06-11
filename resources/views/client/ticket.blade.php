@extends('base')
@section('title', 'Ticket')
@section('content')
<style>
    .move-right {
        text-align: right;
    }

    .card-body a {
        text-decoration: none;
    }

    /* .container {
            width: 1200px;
        } */

    .left_side {
        border: 2px #eee solid;
        padding: 10px 15px;
        margin-right: 96px;
        max-height: 715px;
    }

    .info_agent {
        border: 2px #eee solid;
        padding: 10px 15px;
    }

    .right_side {
        border: 2px #eee solid;
        padding: 10px 15px;
    }

    .line {
        border: 1px #eee solid;
        margin-bottom: 10px;
    }

    .message,
    .date {
        margin-left: 23px;
    }
</style>

<div class="container mx-auto my-3 col-10">

    <h3 class="mb-3"><strong>A propos du ticket</strong></h3>

    <div class="row">
        <div class="left_side col-lg-4">
            <h2 class="mb-3">Sujet du ticket</h2>

            <div>
                <p><i>05/05/2023</i></p>
                <p><strong>Catégorie :</strong> Catégorie 1</p>
            </div>

            <div class="line"></div>

            <div>
                <p><strong>Total de réponses :</strong> 1</p>
                <p><strong>Status :</strong> En attente</p>
            </div>

            <div class="line"></div>

            <div class="mb-3">
                <p><strong>Fichiers attachés :</strong></p>
                <div class="d-inline">
                    <img src="../images/image1.jpg" alt="Fichier attaché" class="img-thumbnail w-25" onclick="showImage('../images/image1.jpg')" />
                </div>
                <div class="d-inline">
                    <img src="../images/image2.jpg" alt="Fichier attaché" class="img-thumbnail w-25" onclick="showImage('../images/image2.jpg')" />
                </div>
            </div>

            <div class="line"></div>

            <div class="mb-3">
                <h3 class="mb-3"><strong>Informations sur l'agent assigné</strong></h3>

                <i class="fas fa-user-tie fa-lg mb-3">
                    <h3 class="d-inline">Nom&prénom Agent</h3>
                </i>

                <div>
                    <p><strong>Fonction :</strong> Fonction 1</p>
                    <p><strong>Email :</strong> Agent1@gmail.com</p>
                    <p><strong>Téléphone :</strong> 065555</p>
                </div>
            </div>
            <div class="line"></div>

            <div class="mb-5">
                <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                <a href="#" class="btn btn-success btn-sm">Modifier</a>
            </div>
        </div>

        <div class="right_side col-lg-7">

            <div class="client">
                <i class="fas fa-user fa-lg mb-2">
                    <h5 class="d-inline"><strong>Vous</strong></h5>
                </i>

                <i>
                    <h6 class="date">13/05/23 - 11:50</h6>
                </i>

                <p class="message">Description du ticket Description du ticket Description du ticket Description du ticket Description du ticket Description du ticket Description du ticket Description du ticket</p>
            </div>

            <div class="line"></div>

            <div class="agent">
                <i class="fas fa-user-tie fa-lg mb-2">
                    <h5 class="d-inline"><strong>Agent</strong></h5>
                </i>

                <i>
                    <h6 class="date">13/05/23 - 12:30</h6>
                </i>

                <p class="message">Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent</p>
            </div>

            <div class="line"></div>

            <div class="client">
                <i class="fas fa-user fa-lg mb-2">
                    <h5 class="d-inline"><strong>Vous</strong></h5>
                </i>

                <i>
                    <h6 class="date">13/05/23 - 11:50</h6>
                </i>

                <p class="message">Réponse du client Réponse du client Réponse du client Réponse du client Réponse du client Réponse du client Réponse du client Réponse du client Réponse du client</p>
            </div>

            <div class="line"></div>

            <div class="agent">
                <i class="fas fa-user-tie fa-lg mb-2">
                    <h5 class="d-inline"><strong>Agent</strong></h5>
                </i>

                <i>
                    <h6 class="date">13/05/23 - 12:30</h6>
                </i>

                <p class="message">Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent Réponse de l'agent</p>
            </div>

            <div class="line"></div>

            <div class="form-group">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <textarea name="" id="" cols="70" rows="4" placeholder="Entrez votre message ici..."></textarea>

                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
                    </div>
                </form>
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

@endsection