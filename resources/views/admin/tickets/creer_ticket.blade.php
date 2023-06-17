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


<div class="container form-container col-lg-7 my-5">
    @include('includes.success')
    @include('includes.errors')
    <h1 class="text text-center">Créer un ticket</h1>

    <div class="form-group">
        <form action="{{route('admin.enregistrer_ticket')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="client">Client concerné</label>
                <div class="d-flex align-items-center justify-content-between">
                    <select class="js-example-basic-multiple form-control border-info" name="client" id="client" style="width: 250px;">
                        <option>Sélectionnez le client</option>
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                        @endforeach
                    </select>
                    <a href="{{route('admin.ajouter_client')}}" class="btn btn-primary">+ Nouveau client</a>
                </div>
            </div>

            <div class="mb-3">
                <label for="titre">Titre</label>
                <input type="text" class="form-control border-info" name="titre">
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control border-info" rows="5" name="description" id="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="categorie">Catégorie</label>
                <select class="js-example-basic-multiple form-control border-info" name="categorie" id="categorie" style="width: 250px;">
                    <option value="">Sélectionnez la catégorie</option>
                    @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="statut">Statut</label>
                <select class="js-example-basic-multiple form-control border-info" name="statut" id="statut" style="width: 250px;">
                    @foreach ($statuts as $statut)
                    <option value="{{ $statut->id }}">{{ $statut->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="priorite">Priotité</label>
                <select class="js-example-basic-multiple form-control border-info" name="priorite" id="priorite" style="width: 250px;">
                    <option value="">Sélectionnez la priorité</option>
                    @foreach ($priorites as $priorite)
                    <option value="{{ $priorite->id }}">{{ $priorite->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jointures[]">Ajouter des fichiers</label>
                <input type="file" class="form-control border-info" name="jointures[]" multiple>
            </div>

            <div class="mb-3">
                <label for="agent">Agent assigné</label>
                <select class="js-example-basic-multiple form-control border-info" name="agent" id="agent" style="width: 250px;">
                    <option value="">Sélectionnez l'agent</option>
                    @foreach($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->nom }} {{ $agent->prenom }}</option>
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