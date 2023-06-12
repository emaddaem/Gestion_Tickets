@extends('base')
@section('title', 'Ajouter un client')
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
@endsection