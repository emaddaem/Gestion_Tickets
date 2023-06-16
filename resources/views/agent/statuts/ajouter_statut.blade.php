@extends('base')
@section('title', 'Ajouter un statut')
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
    <h1 class="text text-center">Ajouter une statut</h1>

    <div class="form-group">
        <form action="{{route('agent.enregistrer_statut')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>

            <div>
                <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
                <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection