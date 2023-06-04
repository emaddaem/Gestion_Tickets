<head>
    <title>Modifier un ticket</title>
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
    <h1 class="text text-center">Modifier le ticket</h1>

    <div class="form-group">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 d-flex align-items-center">
                <label for="client">Client concerné</label>
                <select name="client" id="client" style="width: 250px; height: 37px; margin-left: 10px">
                    <!-- <option>Sélectionnez l'client</option> -->
                    <option>Client1</option>
                    @foreach (['Client2', 'Client3', 'Client4', 'Client5'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
                <a href="/ajouter_client" class="btn btn-primary">+ Nouveau client</a>
            </div>

            <div class="mb-3">
                <label for="sujet">Sujet</label>
                <input type="text" class="form-control" name="sujet" value="Sujet 1">
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description">Description du sujet 1</textarea>
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
                <label for="status">Status</label>
                <select name="status" id="status" style="width: 250px; margin-left: 10px">
                    <option value="nouveau">Nouveau</option>
                    @foreach (['En attente', 'Non assigné', 'Résolu'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="priotite">Priotité</label>
                <select name="priotite" id="priotite" style="width: 250px; margin-left: 10px">
                    <option>Sélectionnez la priorité</option>
                    @foreach (['Faible', 'Moyenne', 'Haute', 'Urgent', 'Bloquant'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="images[]">Ajouter des fichiers</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>

            <div class="mb-3">
                <label for="agent">Agent assigné</label>
                <select name="agent" id="agent" style="width: 250px; margin-left: 10px">
                    <!-- <option>Sélectionnez l'agent</option> -->
                    <option>Agent1</option>
                    @foreach (['Agent2', 'Agent3', 'Agent4', 'Agent5'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <input type="submit" value="Enregistrer" class="btn btn-success mt-3">
                <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
            </div>
        </form>
    </div>
</div>