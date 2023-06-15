@extends('base')
@section('title', 'Modifier une priorite')
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

<div class="container col-lg-10 my-5">
    <h1 class="text text-center">Modifier la priorite</h1>

    <div class="form-group">
        <form action="{{route('admin.update_priorite', $priorite->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{$priorite->nom}}">
            </div>

            <div>
                <input type="submit" value="Enregistrer" class="btn btn-success mt-3">
                <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection