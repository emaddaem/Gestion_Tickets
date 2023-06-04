<head>
    <title>Créer un ticket</title>
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

@include('includes.navbar_client')

<div class="container">
    <h1 class="text text-center mb-3">Créer un ticket</h1>

    <div class="form-group">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="sujet">Sujet</label>
                <input type="text" class="form-control" name="sujet">
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="categorie">Catégorie</label>
                <select name="categorie" id="categorie" style="width: 250px; margin-left: 10px">
                    <option>Sélectionnez la catégorie</option>
                    @foreach (['catégorie 1', 'catégorie 2', 'catégorie 3', 'catégorie 4'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="images[]">Ajouter des fichiers</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>

            <div class="mb-3">
                <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
                <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
            </div>

        </form>
    </div>
</div>