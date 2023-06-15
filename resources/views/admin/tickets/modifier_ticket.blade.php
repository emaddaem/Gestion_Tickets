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

<div class="container col-lg-7 my-5">
    <h1 class="text text-center">Modifier le ticket</h1>

    <div class="form-group">
        <form action="{{route('admin.update_ticket', $ticket->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="client">Client concerné</label>
                <div class="d-flex align-items-center justify-content-between">
                    <select class="js-example-basic-multiple form-control border-info" name="client" id="client" style="width: 250px; height: 37px; margin-left: 10px">
                        <option value="">Sélectionnez l'client</option>
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}" @if ($ticket->user && $ticket->user->id == $client->id) selected @endif>
                            {{ $client->nom }} {{ $client->prenom }}
                        </option>
                        @endforeach
                    </select>
                    <a href="{{route('admin.ajouter_client')}}" class="btn btn-primary">+ Nouveau client</a>
                </div>
            </div>

            <div class="mb-3">
                <label for="titre">Titre</label>
                <input type="text" class="form-control border-info" name="titre" value="{{$ticket->titre}}">
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control border-info" name="description" id="description">{{$ticket->description}}</textarea>
            </div>

            <div class="mb-3">
                <label for="categorie">Catégorie</label>
                <select class="js-example-basic-multiple form-control border-info" name="categorie" id="categorie" style="width: 250px; margin-left: 10px">
                    <option value="">Sélectionnez la catégorie</option>
                    @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" @if ($ticket->categorie && $ticket->categorie->id == $categorie->id) selected @endif>
                        {{ $categorie->nom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="statut">Statut</label>
                <select class="js-example-basic-multiple form-control border-info" name="statut" id="statut" style="width: 250px; margin-left: 10px">
                    <option value="">Sélectionnez le statut</option>
                    @foreach ($statuts as $statut)
                    <option value="{{ $statut->id }}" @if ($ticket->statut && $ticket->statut->id == $statut->id) selected @endif>
                        {{ $statut->nom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="priorite">Priotité</label>
                <select class="js-example-basic-multiple form-control border-info" name="priorite" id="priorite" style="width: 250px; margin-left: 10px">
                    <option value="">Sélectionnez la priorité</option>
                    @foreach ($priorites as $priorite)
                    <option value="{{ $priorite->id }}" @if ($ticket->priorite && $ticket->priorite->id == $priorite->id) selected @endif>
                        {{ $priorite->nom }}
                    </option>
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
                    @foreach($agents as $agent)
                    <option value="{{ $agent->id }}" @if ($ticket->agent && $ticket->agent->id == $agent->id) selected @endif>
                        {{ $agent->nom }} {{ $agent->prenom }}
                    </option>
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
@endsection