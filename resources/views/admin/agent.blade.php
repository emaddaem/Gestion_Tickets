<head>
    <title>Afficher un agent</title>
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

<div class="container">
    <h3 class="text-center mt-5"><strong>Informations sur l'agent</strong></h3>

    <div class="row mt-5">

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="/tickets_specifiques">
                        <h5 class="card-title">Tickets ouverts</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="/tickets_specifiques">
                        <h5 class="card-title">Tickets résolus</h5>
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

    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Sujet</th>
                            <th>Description</th>
                            <th>Priorité</th>
                            <th>Status</th>
                            <th>Crée a</th>
                            <th>Mise a jour a</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ticket 1</td>
                            <td>Description de la première ticket</td>
                            <td>Moyenne</td>
                            <td>En attente</td>
                            <td>05/05/2023</td>
                            <td>05/05/2023</td>
                            <td>
                                <a href="/afficher_ticket" class="btn btn-dark btn-sm mb-1">Afficher</a>

                                <a href="/modifier_ticket" class="btn btn-success btn-sm mb-1">Modifier</a>

                                <form action="" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>