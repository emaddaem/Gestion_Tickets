    @extends('base')
    @section('title', 'Liste des catégories')
    @section('content')

    <style>
        .move-right {
            text-align: right;
        }

        .creer-ticket {
            text-align: right;
        }
    </style>

    <div class="container mt-5">
        <h2 class="mt-3">Liste des catégories</h2>

        <div class="creer-ticket">
            <a href="{{route('admin.ajouter_categorie')}}" class="btn btn-success mt-2">Ajouter une catégorie</a>
        </div>

        <div class="container mt-3">
            <div class="row">
                @if ($categories && $categories->count() > 0)
                <div class="col">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Créée à</th>
                                <th>Mise à jour à</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                            <tr>
                                <td>1</td>
                                <td>{{$categorie->nom}}</td>
                                <td>{{$categorie->created_at}}</td>
                                <td>{{$categorie->updated_at}}</td>
                                <td>
                                    <a href="{{route('admin.modifier_categorie', $categorie->id)}}" class="btn-sm"><i class="fas fa-edit fa-lg"></i></a>

                                    <a href="{{route('admin.supprimer_categorie', $categorie->id)}}" class="btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endsection