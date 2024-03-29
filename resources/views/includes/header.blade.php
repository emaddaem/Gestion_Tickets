<ul class="container d-flex nav nav-tabs mb-3 justify-content-between" id="pills-tab2" role="tablist">
    @guest
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" href="/" role="tab" aria-controls="nav-tabs" aria-selected="true">
                <i class="mdi mdi-star-outline"></i> Accueil
            </a>
        </li>
    @else
        @if(Auth::check())
            @if(Auth::user()->role === 'client')
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" href="{{route('client.index')}}" role="tab" aria-controls="nav-tabs" aria-selected="true">
                    <i class="mdi mdi-star-outline"></i> Accueil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('client.tickets')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('client.creer_ticket')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Créer un ticket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('client.profil')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <i class="mdi mdi-account"></i>
                    Profil</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                    Plus
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Contact</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">A propos de nous</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('signout')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Se déconnecter</a>
            </li>
            @elseif(Auth::user()->role === 'agent')
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" href="{{route('agent.index')}}" role="tab" aria-controls="nav-tabs" aria-selected="true">
                    <i class="mdi mdi-star-outline"></i> Accueil
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('agent.tickets')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <i class="mdi mdi-account"></i>
                    Tickets</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="optionsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plus</a>
                <div class="dropdown-menu" aria-labelledby="optionsDropdown">
                    <a class="dropdown-item" href="{{route('agent.statuts')}}">Liste des statuts</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="">Autres</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('agent.profil')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <i class="mdi mdi-account"></i>
                    Profil</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('signout')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Se déconnecter</a>
            </li>
            @elseif(Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" href="{{route('admin.index')}}" role="tab" aria-controls="nav-tabs" aria-selected="true">
                    <i class="mdi mdi-star-outline"></i> Accueil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('admin.tickets')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('admin.clients')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <i class="mdi mdi-account"></i>
                    Clients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('admin.agents')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <i class="mdi mdi-account"></i>
                    Agents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('admin.admins')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <i class="mdi mdi-account"></i>
                    Admins</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="optionsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plus</a>
                <div class="dropdown-menu" aria-labelledby="optionsDropdown">
                    <a class="dropdown-item" href="{{route('admin.categories')}}">Liste des catégories</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin.statuts')}}">Liste des statuts</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin.priorites')}}">Liste des priorités</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin.tickets_supprimes')}}">Tickets supprimés</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('admin.profil')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <i class="mdi mdi-account"></i>
                    Profil</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="nav-profile-tab" href="{{route('signout')}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Se déconnecter</a>
            </li>
            @endif
        @endif
    @endguest
</ul>