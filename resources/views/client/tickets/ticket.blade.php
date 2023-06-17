@extends('base')
@section('title', 'Ticket')
@section('content')

<style>
    .move-right {
        text-align: right;
    }

    .card-body a {
        text-decoration: none;
    }

    .info_agent {
        border: 2px #eee solid;
        padding: 10px 15px;
    }

    .right_side .commentaires {
        max-height: 600px;
        overflow-y: scroll;
    }

    .line {
        border: 1px #99b8fd solid;
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

    <h3 class="mb-3"><strong>A propos du ticket</strong></h3>

    <div class="row">
        <div class="left_side col-lg-4">
            <h3 class="mb-3">{{$ticket->titre}}</h3>

            <h6 class="my-2"><strong>Date de création :</strong> {{ $ticket->created_at->format('d-m-Y H:i') }}</h6>
            <h6 class="my-2"><strong>Catégorie :</strong> {{$ticket->categorie->nom}}</h6>

            <div class="line"></div>

            @php
            $nombreCommentairesAgent = $ticket->commentaires->where('user.role', 'agent')->count();
            @endphp
            <h6 class="my-2"><strong>Total de réponses :</strong> {{$ticket->commentaires ? $nombreCommentairesAgent : '0'}}</h6>

            <h6 class="my-2"><strong>Status :</strong> {{$ticket->statut ? $ticket->statut->nom : 'Pas encore défini'}}</h6>

            <div class="line"></div>

            <div class="my-3">
                <h6 class="my-2"><strong>Fichiers attachés :</strong></h6>
                <div class="d-inline">
                    @if($ticket->jointures)
                    @foreach($ticket->jointures as $jointure)
                    <img src="{{ asset('images/jointures/' . $jointure->chemin) }}" alt="Fichier attaché" class="img-thumbnail w-25" onclick="showImage('{{ asset('images/jointures/' . $jointure->chemin) }}')" />
                    @endforeach
                    @endif
                </div>
            </div>
            @if($ticket->statut && $ticket->statut->nom !== 'Résolu')
            <form action="{{route('client.ajouter_jointures', $ticket->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="my-2">
                    <h6 class="my-2"><strong>Ajouter des fichiers :</strong></h6>
                    <input type="file" class="form-control border-info" name="jointures[]" multiple>
                </div>

                <div class="my-2">
                    <input type="submit" value="Ajouter" class="btn btn-primary btn-sm">
                </div>
            </form>
            @endif
            <div class="line"></div>

            <div class="my-3">
                <h3 class="mb-3"><strong>Informations sur l'agent assigné :</strong></h3>
                @if($ticket->agent)
                <div class="my-2">
                    <i class="fas fa-user-tie"></i>
                    <h3 class="d-inline"> {{$ticket->agent->prenom}}</h3>
                </div>
                <div class="my-2">
                    <h6 class="my-1"><strong>Email :</strong> {{$ticket->agent->email}}</h6>
                    <h6 class="my-1"><strong>Téléphone :</strong> {{$ticket->agent->telephone}}</h6>
                </div>
                @else
                <h3 class="my-3">Pas encore assigné</h3>
                @endif
            </div>

            <div class="line"></div>

            <div class="my-3">
                <ul class="d-flex justify-content-between">
                    <li>
                        @if($ticket->statut && $ticket->statut->nom !== 'Résolu')
                        <a href="{{route('client.modifier_ticket', $ticket->id)}}" class="btn btn-success btn-sm">Modifier</a>
                        @endif
                    </li>
                    <li>
                        <a href="{{route('client.supprimer_ticket', $ticket->id)}}" class="btn btn-danger btn-sm">Supprimer</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="right_side col-lg-7">

            <div class="client">
                <div>
                    <i class="fas fa-user fa-lg mb-2"></i>
                    <h5 class="d-inline"><strong>Vous</strong></h5>
                </div>

                <i>
                    <p class="date">{{$ticket->created_at->format('d-m-Y H:i')}}</p>
                </i>

                <h5 class="message">{{$ticket->description}}</h5>
            </div>

            <div class="line_top"></div>

            <div class="commentaires">
                @if($ticket->commentaires)
                @foreach($ticket->commentaires as $commentaire)
                @if($commentaire->user && $commentaire->user->role == 'agent')
                <div class="agent">
                    <div>
                        <i class="fas fa-user-tie fa-lg mb-2"></i>
                        <h5 class="d-inline"><strong> {{$ticket->agent->prenom}}</strong></h5>
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
                        <h5 class="d-inline"><strong>Vous</strong></h5>
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
            @if($ticket->statut && $ticket->statut->nom !== 'Résolu')
            <div class="line_bottom"></div>
            <div class="form-group">
                <form action="{{route('client.creer_commentaire', $ticket->id)}}" method="post" enctype="multipart/form-data">
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
            @else
            <h5 class="text text-center">Vous n'avez plus le droit d'intéragir</h5>
            @endif
        </div>
    </div>
</div>
@endsection