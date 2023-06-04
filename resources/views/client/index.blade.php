<head>
    <title>Tableau de board</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/fontawesome-5.15.4/css/all.min.css') }}">

    <style>
        .move-right {
            text-align: right;
        }

        .card-body a {
            text-decoration: none;
        }
    </style>
</head>

@include('includes.navbar_client')

<div class="container my-5">
    <h3 class="mt-5"><strong>Tableau de board</strong></h3>

    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card" style="width: 19rem;">
                <div class="card-body">
                    <a href="/tickets_specifiques">
                        <h5 class="card-title">Tickets non résolus</h5>
                    </a>
                    <h5 class="card-title move-right"><strong>0</h5></strong>
                </div>
            </div>
        </div>

        <div class="col-md-3"></div>
        <div class="col-md-3"></div>

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
    </div>

    <h4 class="mt-5 mb-4"><strong>Mes tickets</strong></h4>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>Id</th>
                            <th>Sujet</th>
                            <th>Status</th>
                            <th>Agent assigné</th>
                            <th>Créé a</th>
                            <th>Mise a jour a</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ticket 1</td>
                            <td>En attente</td>
                            <td>Agent 1</td>
                            <td>05/05/2023</td>
                            <td>05/05/2023</td>
                            <td>
                                <a href="/client/ticket" class="btn-sm"><i class="fas fa-eye fa-lg"></i></a>

                                <a href="/client/modifier_ticket" class="btn-sm"><i class="fas fa-edit fa-lg"></i></a>

                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    <a href="#" class="btn-sm" onclick="document.forms[0].submit()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Ticket 1</td>
                            <td>En attente</td>
                            <td>Agent 1</td>
                            <td>05/05/2023</td>
                            <td>05/05/2023</td>
                            <td>
                                <a href="/client/ticket" class="btn-sm"><i class="fas fa-eye fa-lg"></i></a>

                                <a href="/client/modifier_ticket" class="btn-sm"><i class="fas fa-edit fa-lg"></i></a>

                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    <a href="#" class="btn-sm" onclick="document.forms[0].submit()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Ticket 1</td>
                            <td>En attente</td>
                            <td>Agent 1</td>
                            <td>05/05/2023</td>
                            <td>05/05/2023</td>
                            <td>
                                <a href="/client/ticket" class="btn-sm"><i class="fas fa-eye fa-lg"></i></a>

                                <a href="/client/modifier_ticket" class="btn-sm"><i class="fas fa-edit fa-lg"></i></a>

                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    <a href="#" class="btn-sm" onclick="document.forms[0].submit()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>