@extends('base')
@section('title', 'Modifier un ticket')
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
    <h1 class="text text-center">Modifier le ticket</h1>

    <div class="form-group">
        <form action="{{route('client.update_ticket', $ticket->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre" value="{{$ticket->titre}}">
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description">{{$ticket->description}}</textarea>
            </div>

            <div class="mb-3">
                <label for="categorie">Catégorie</label>
                <select name="categorie" id="categorie" style="width: 250px; margin-left: 10px">
                    <option>Sélectionnez la catégorie</option>
                    @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" @if ($ticket->categorie->id == $categorie->id) selected @endif>
                        {{ $categorie->nom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jointures[]">Ajouter des fichiers</label>
                <input type="file" class="form-control" name="jointures[]" multiple>
            </div>

            <div>
                <input type="submit" value="Enregistrer" class="btn btn-success mt-3">
                <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection