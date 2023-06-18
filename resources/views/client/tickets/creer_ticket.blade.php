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

@include('includes.success')
@include('includes.errors')

<div class="container form-container col-lg-7">
    <h1 class="text text-center mb-3">Créer un ticket</h1>

    <div class="form-group">
        <form action="{{route('client.enregistrer_ticket')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="titre">Titre</label>
                <input type="text" class="form-control border-info" name="titre">
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control border-info" name="description" id="description"></textarea>
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
                <label for="jointures[]">Ajouter des fichiers</label>
                <input type="file" class="form-control border-info" name="jointures[]" multiple>
            </div>

            <div class="mb-3 text-right">
                <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
                <input type="submit" value="Créer" class="btn btn-primary mt-3">
            </div>

        </form>
    </div>
</div>

@endsection