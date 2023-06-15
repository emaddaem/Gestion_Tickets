@extends('base')
@section('title', 'Créer un ticket')
@section('content')

    <style>
        .move-right {
            text-align: right;
        }

        .creer-ticket {
            text-align: right;
        }

    </style>

<div class="container">
    <h1 class="text text-center">Créer un ticket</h1>

    <div class="form-group">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 d-flex align-items-center">
                <label for="client">Client concerné</label>
                <select class="js-example-basic-multiple form-control border-info" name="client" id="client" style="width: 250px; height: 37px; margin-left: 10px">
                    <option value="">Sélectionnez l'client</option>
                    @foreach (['Client1', 'Client2', 'Client3', 'Client4', 'Client5'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
                <a href="/ajouter_client" class="btn btn-primary">+ Nouveau client</a>
            </div>

            <div class="mb-3">
                <label for="sujet">Sujet</label>
                <input type="text" class="form-control border-info" name="sujet">
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control border-info" name="description" id="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="categorie">Catégorie</label>
                <select class="js-example-basic-multiple form-control border-info" name="categorie" id="categorie" style="width: 250px; margin-left: 10px">
                    <option value="">Sélectionnez la catégorie</option>
                    @foreach (['catégorie 1', 'catégorie 2', 'catégorie 3', 'catégorie 4'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="status">Status</label>
                <select class="js-example-basic-multiple form-control border-info" name="status" id="status" style="width: 250px; margin-left: 10px">
                    <option value="nouveau">Nouveau</option>
                    @foreach (['En attente', 'Non assigné', 'Résolu'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="priotite">Priotité</label>
                <select class="js-example-basic-multiple form-control border-info" name="priotite" id="priotite" style="width: 250px; margin-left: 10px">
                    <option value="">Sélectionnez la priorité</option>
                    @foreach (['Faible', 'Moyenne', 'Haute', 'Urgent', 'Bloquant'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="images[]">Ajouter des fichiers</label>
                <input type="file" class="form-control border-info" name="images[]" multiple>
            </div>

            <div class="mb-3">
                <label for="agent">Agent assigné</label>
                <select class="js-example-basic-multiple form-control border-info" name="agent" id="agent" style="width: 250px; margin-left: 10px">
                    <option value="">Sélectionnez l'agent</option>
                    @foreach (['Agent1', 'Agent2', 'Agent3', 'Agent4', 'Agent5'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
                <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
            </div>

        </form>
    </div>
</div>
@endsection