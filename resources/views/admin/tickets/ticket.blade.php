@extends('base')
@section('title', 'Afficher un ticket')
@section('content')

<style>
    .card-body a {
        text-decoration: none;
    }

    /* .container {
            width: 1200px;
        } */

    .left_side {
        border: 2px #eee solid;
        padding: 10px 15px;
        margin-right: 96px;
        max-height: 920px;
    }

    .info_agent {
        border: 2px #eee solid;
        padding: 10px 15px;
    }

    .right_side {
        border: 2px #eee solid;
        padding: 10px 15px;
    }

    .right_side .commentaires {
        max-height: 600px;
        overflow-y: scroll;
    }

    .line {
        border: 1px #eee solid;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .line_top,
    .line_bottom {
        border: 1px #31343d solid;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .message,
    .date {
        margin-left: 23px;
    }
</style>


<div class="container mx-auto my-3 col-10">
    @include('includes.success')
    @include('includes.errors')

    <div class="d-flex justify-content-between">
        <h3 class="mb-3"><strong>A propos du ticket</strong></h3>
        <h3>
            <a href="{{route('admin.fermer_ticket', $ticket->id)}}" class="btn btn-danger btn-sm">Fermer le ticket</a>
        </h3>
    </div>

    <div class="row">
        <div class="left_side col-lg-4">
            <h3 class="mb-3">{{$ticket->titre}}</h3>

            @php
            $nombreCommentairesClient = $ticket->commentaires->where('user.role', 'client')->count();
            @endphp
            <h6 class="my-2"><strong>Total de réponses :</strong>
                {{$ticket->commentaires ? $nombreCommentairesClient : '0'}}
            </h6>

            <h6 class="my-2"><strong>Date de création :</strong> {{ $ticket->created_at->format('d-m-Y H:i') }}</h6>
            <h6 class="my-2"><strong>Catégorie :</strong> {{$ticket->categorie->nom}}</h6>

            <div class="line"></div>

            <h6 class="my-2"><strong>Priorité :</strong>
                {{$ticket->priorite ? $ticket->priorite->nom : 'Pas encore défini'}}
            </h6>

            <h6 class="my-2"><strong>Status :</strong>
                {{$ticket->statut ? $ticket->statut->nom : 'Pas encore défini'}}
            </h6>


            <div class="line"></div>

            <div class="my-3">
                <h6 class="my-1"><strong>Fichiers attachés :</strong></h6>
                <div class="d-inline">
                    @if($ticket->jointures)
                    @foreach($ticket->jointures as $jointure)
                    <img src="{{ asset('images/jointures/' . $jointure->chemin) }}" alt="Fichier attaché" class="img-thumbnail w-25" onclick="showImage('{{ asset('images/jointures/' . $jointure->chemin) }}')" />
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="line"></div>

            <div class="my-3">
                <h3 class="mb-3"><strong>Informations sur le client :</strong></h3>
                @if($ticket->user)
                <i class="fas fa-user"></i>
                <h3 class="d-inline"> {{$ticket->user->prenom}} {{$ticket->user->nom}}</h3>

                <h6 class="my-2"><strong>Email :</strong> {{$ticket->user->email}}</h6>
                <h6 class="my-2"><strong>Téléphone :</strong> {{$ticket->user->telephone}}</h6>
                @endif
            </div>

            <div class="line"></div>

            <div class="my-3">
                <h3 class="mb-3"><strong>Informations sur l'agent assigné :</strong></h3>
                @if($ticket->agent)
                <i class="fas fa-user-tie"></i>
                <h3 class="d-inline"> {{$ticket->agent->prenom}}</h3>

                <h6 class="my-2"><strong>Email :</strong> {{$ticket->agent->email}}</h6>
                <h6 class="my-2"><strong>Téléphone :</strong> {{$ticket->agent->telephone}}</h6>
                @else
                <h4 class="text text-center my-2">Pas encore assigné</h4>

                <form action="{{route('admin.assigner_agent', $ticket->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="agent">Ajouter un agent :</label>
                    <select class="js-example-basic-multiple form-control border-info" name="agent" id="agent" style="width: 250px; margin-left: 10px">
                        <option value="">Sélectionnez l'agent</option>
                        @foreach($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->nom }} {{ $agent->prenom }}</option>
                        @endforeach
                    </select>

                    <div class="my-2">
                        <input type="submit" value="Ajouter" class="btn btn-primary btn-sm">
                    </div>
                </form>
                @endif
            </div>

            <div class="line"></div>

            <div class="my-3">
                <ul class="d-flex justify-content-between">
                    <li>
                        <a href="{{route('admin.modifier_ticket', $ticket->id)}}" class="btn btn-success btn-sm">Modifier</a>
                    </li>
                    <li>
                        <a href="{{route('admin.supprimer_ticket', $ticket->id)}}" class="btn btn-danger btn-sm">Supprimer</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="right_side col-lg-7">
            <div class="client">
                <div>
                    <i class="fas fa-user fa-lg"></i>
                    <h5 class="d-inline"><strong> {{$ticket->user->prenom}} {{$ticket->user->nom}}</strong></h5>
                </div>

                <i>
                    <p class="date">{{$ticket->created_at->format('d-m-Y H:i')}}</p>
                </i>

                <h5 class="message">{{$ticket->description}}</h5>
            </div>

            <div class="line_top mt-3"></div>

            <div class="commentaires">
                @if($ticket->commentaires)
                @foreach($ticket->commentaires as $commentaire)
                @if($commentaire->user && $commentaire->user->role == 'agent')
                <div class="agent">
                    <div>
                        <i class="fas fa-user-tie fa-lg mb-2"></i>
                        <h5 class="d-inline"><strong> {{$ticket->agent->prenom}} {{$ticket->agent->nom}}</strong></h5>
                    </div>

                    <i>
                        <p class="date">{{$commentaire->created_at->format('d-m-Y H:i')}}</p>
                    </i>

                    <h6 class="message">{{$commentaire->contenu}}</h6>
                </div>

                <div class="line"></div>

                @elseif($commentaire->user && $commentaire->user->role == 'client')
                <div class="client">
                    <div>
                        <i class="fas fa-user fa-lg mb-2"></i>
                        <h5 class="d-inline"><strong> {{$ticket->user->prenom}} {{$ticket->user->nom}}</strong></h5>
                    </div>

                    <i>
                        <p class="date">{{$commentaire->created_at->format('d-m-Y H:i')}}</p>
                    </i>

                    <h6 class="message">{{$commentaire->contenu}}</h6>
                </div>

                <div class="line"></div>

                @elseif($commentaire->user && $commentaire->user->role == 'admin')
                <div class="agent">
                    <div>
                        <i class="fas fa-user-tie fa-lg mb-2"></i>
                        <h5 class="d-inline"><strong> Administrateur</strong></h5>
                    </div>

                    <i>
                        <p class="date">{{$commentaire->created_at->format('d-m-Y H:i')}}</p>
                    </i>

                    <h6 class="message">{{$commentaire->contenu}}</h6>
                </div>

                <div class="line"></div>

                @endif
                @endforeach
                @else
                <h1>pas de commentaires</h1>
                @endif
            </div>
            <div class="line_bottom"></div>

            <div class="form-group">
                <form action="{{route('admin.creer_commentaire', $ticket->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- <textarea name="contenu" id="contenu" cols="70" rows="4" placeholder="Entrez votre message ici..."></textarea> -->
                    <div class="md-form">
                        <label for="form7">Répondre :</label>
                        <textarea name="contenu" id="contenu" class="md-textarea form-control" rows="3" placeholder="Entrez votre message ici..."></textarea>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection