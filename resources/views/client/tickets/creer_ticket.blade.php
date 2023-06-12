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

<div class="container">
    <h1 class="text text-center mb-3">Créer un ticket</h1>

    <div class="form-group">
        <form action="{{route('client.enregistrer_ticket')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre">
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="categorie">Catégorie</label>
                <select name="categorie" id="categorie" style="width: 250px; margin-left: 10px">
                    <option value="">Sélectionnez la catégorie</option>
                    @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jointures[]">Ajouter des fichiers</label>
                <input type="file" class="form-control" name="jointures[]" multiple>
            </div>

            <div class="mb-3">
                <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
                <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
            </div>

        </form>
    </div>
</div>

@endsection