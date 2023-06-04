<head>
    <title>Ajouter un client</title>
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

        .creer-ticket {
            text-align: right;
        }
    </style>
</head>

@include('includes.navbar')

<div class="container">
    <h1 class="text text-center">Ajouter un client</h1>

    <div class="form-group">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>

            <div class="mb-3">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom">
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="mb-3">
                <label for="telephone">Téléphone</label>
                <input type="number" class="form-control" name="telephone">
            </div>
 
            <div>
                <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
                <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
            </div>
        </form>
    </div>
</div>