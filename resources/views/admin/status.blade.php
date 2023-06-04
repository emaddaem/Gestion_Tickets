<head>
    <title>Liste des status</title>
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

        .creer-ticket {
            text-align: right;
        }
    </style>
</head>

@include('includes.navbar')

<div class="container mt-5">
    <h2 class="mt-3">Liste des status</h2>

    <div class="creer-ticket">
        <a href="/admin/ajouter_status" class="btn btn-success mt-2">Ajouter un status</a>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Crée a</th>
                            <th>Mise a jour a</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Status 1</td>
                            <td>05/05/2023</td>
                            <td>05/05/2023</td>
                            <td>
                                <a href="/admin/modifier_status" class="btn-sm"><i class="fas fa-edit fa-lg"></i></a>

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