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
        max-height: 715px;
    }

    .info_agent {
        border: 2px #eee solid;
        padding: 10px 15px;
    }

    .right_side {
        border: 2px #eee solid;
        padding: 10px 15px;
    }

    .line {
        border: 1px #eee solid;
        margin-bottom: 10px;
    }

    .message,
    .date {
        margin-left: 23px;
    }
</style>

<div class="container mx-auto my-3 col-10">
    <h3 class="mb-3"><strong>A propos du ticket</strong></h3>

    <div class="row">
        <div class="left_side col-lg-4">
            <h3 class="mb-3">{{$ticket->titre}}</h3>

            @php
            $nombreCommentairesClient = $ticket->commentaires->where('user.role', 'client')->count();
            @endphp
            <p><strong>Total de réponses :</strong>
                {{$ticket->commentaires ? $nombreCommentairesClient : '0'}}
            </p>

            <div>
                <p>{{ $ticket->created_at->format('d-m-Y H:i') }}</p>
                <p><strong>Catégorie :</strong> {{$ticket->categorie->nom}}</p>
            </div>

            <div class="line"></div>

            <div>
                <p><strong>Priorité :</strong>
                    {{$ticket->priorite ? $ticket->priorite->nom : 'Pas encore défini'}}
                </p>

                <p><strong>Status :</strong>
                    {{$ticket->statut ? $ticket->statut->nom : 'Pas encore défini'}}
                </p>
            </div>

            <div class="line"></div>

            <div class="mb-3">
                <p><strong>Fichiers attachés :</strong></p>
                <div class="d-inline">
                    @if($ticket->jointures)
                    @foreach($ticket->jointures as $jointure)
                    <img src="{{ asset('images/jointures/' . $jointure->chemin) }}" alt="Fichier attaché" class="img-thumbnail w-25" onclick="showImage('{{ asset('images/jointures/' . $jointure->chemin) }}')" />
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="line"></div>

            <div class="mb-3">
                <h3 class="mb-3"><strong>Informations sur le client</strong></h3>
                @if($ticket->user)
                <div>
                    <i class="fas fa-user fa-lg"></i>
                    <h3 class="d-inline"> {{$ticket->user->prenom}} {{$ticket->user->nom}}</h3>
                </div>
                <div>
                    <p><strong>Email :</strong> {{$ticket->user->email}}</p>
                    <p><strong>Téléphone :</strong> {{$ticket->user->telephone}}</p>
                </div>
                @endif
            </div>
            <div class="line"></div>

            <div>
                <a href="{{route('client.supprimer_ticket', $ticket->id)}}" class="btn btn-danger btn-sm">Supprimer</a>
                <a href="{{route('client.modifier_ticket', $ticket->id)}}" class="btn btn-success btn-sm">Modifier</a>
            </div>
        </div>

        <div class="right_side col-lg-7">

            <div class="client">
                <div>
                    <i class="fas fa-user fa-lg"></i>
                    <h5 class="d-inline"><strong> {{$ticket->user->prenom}} {{$ticket->user->nom}}</strong></h5>
                </div>

                <i>
                    <h6 class="date">{{$ticket->created_at->format('d-m-Y H:i')}}</>
                </i>

                <h5 class="message">{{$ticket->description}}</h5>
            </div>

            <div class="line"></div>

            @if($ticket->commentaires)
            @foreach($ticket->commentaires as $commentaire)
            @if($commentaire->user && $commentaire->user->role == 'agent')
            <div class="agent">
                <div>
                    <i class="fas fa-user-tie fa-lg mb-2"></i>
                    <h5 class="d-inline"><strong> {{$ticket->agent->prenom}} {{$ticket->user->nom}}</strong></h5>
                </div>

                <i>
                    <h6 class="date">{{$commentaire->created_at->format('d-m-Y H:i')}}</h6>
                </i>

                <p class="message">{{$commentaire->contenu}}</p>
            </div>

            <div class="line"></div>

            @elseif($commentaire->user && $commentaire->user->role == 'client')
            <div class="client">
                <div>
                    <i class="fas fa-user fa-lg mb-2"></i>
                    <h5 class="d-inline"><strong> {{$ticket->user->prenom}} {{$ticket->user->nom}}</strong></h5>
                </div>

                <i>
                    <h6 class="date">{{$commentaire->created_at->format('d-m-Y H:i')}}</h6>
                </i>

                <p class="message">{{$commentaire->contenu}}</p>
            </div>

            <div class="line"></div>

            @elseif($commentaire->user && $commentaire->user->role == 'admin')
            <div class="agent">
                <div>
                    <i class="fas fa-user-tie fa-lg mb-2"></i>
                    <h5 class="d-inline"><strong> Administrateur</strong></h5>
                </div>

                <i>
                    <h6 class="date">{{$commentaire->created_at->format('d-m-Y H:i')}}</h6>
                </i>

                <p class="message">{{$commentaire->contenu}}</p>
            </div>
            @endif
            @endforeach
            @else
            <h1>pas de commentaires</h1>
            @endif
            <div class="form-group">
                <form action="{{route('admin.creer_commentaire', $ticket->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <textarea name="contenu" id="contenu" cols="70" rows="4" placeholder="Entrez votre message ici..."></textarea>

                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection