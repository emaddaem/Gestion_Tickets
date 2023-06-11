@extends('base')
@section('title', 'Liste des admins')
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
    <h2 class="mt-3">Liste des admins</h2>

    <div class="creer-ticket">
        <a href="/admin/ajouter_admin" class="btn btn-success mt-2">Ajouter un admin</a>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Crée a</th>
                            <th>Mise a jour a</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nom 1</td>
                            <td>Prénom 1</td>
                            <td>0655555</td>
                            <td>admin1@gmail.com</td>
                            <td>05/05/2023</td>
                            <td>05/05/2023</td>
                            <td>
                                <a href="/admin/admin" class="btn-sm"><i class="fas fa-eye fa-lg"></i></a>

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