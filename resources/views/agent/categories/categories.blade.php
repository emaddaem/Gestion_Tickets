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
            <a href="/admin/ajouter_categorie" class="btn btn-success mt-2">Ajouter une catégorie</a>
        </div>

        <div class="container mt-3">
            <div class="row">
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
                            <tr>
                                <td>1</td>
                                <td>Cat 1</td>
                                <td>05/05/2023</td>
                                <td>05/05/2023</td>
                                <td>
                                    <a href="/admin/modifier_categorie" class="btn-sm"><i class="fas fa-edit fa-lg"></i></a>

                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        <a href="#" class="btn-sm" onclick="document.forms[0].submit()">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection