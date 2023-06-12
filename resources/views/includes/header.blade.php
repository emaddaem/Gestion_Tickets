<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
    <div class="container">
        @guest
        <a class="navbar-brand mr-auto" href="/">Page d'acceuil</a>
        @endguest
        @if(Auth::check())
        @if(Auth::user()->role === 'client')
        <a class="navbar-brand mr-auto" href="{{route('client.index')}}">Dashboard</a>
        @elseif(Auth::user()->role === 'admin')
        <a class="navbar-brand mr-auto" href="{{route('admin.index')}}">Dashboard</a>
        @elseif(Auth::user()->role === 'agent')
        <a class="navbar-brand mr-auto" href="{{route('agent.index')}}">Dashboard</a>
        @endif
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                @if(Auth::check())
                @if(Auth::user()->role === 'client')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('client.tickets')}}">Tickets</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('client.creer_ticket')}}">Créer un ticket</a>
                </li>

                <li class="nav-item dropdown" style="margin-left: 620px;">
                    <a class="nav-link dropdown-toggle" href="#" id="optionsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Paramètres</a>
                    <div class="dropdown-menu" aria-labelledby="optionsDropdown">
                        <a class="dropdown-item" href="{{route('client.categories')}}">Liste des catégories</a>
                        <a class="dropdown-item" href="">Autres</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('client.profil')}}">Profil</a>
                </li>
                @elseif(Auth::user()->role === 'agent')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('agent.tickets')}}">Tickets</a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Clients</a>
                </li> -->

                <li class="nav-item dropdown" style="margin-left: 620px;">
                    <a class="nav-link dropdown-toggle" href="#" id="optionsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Paramètres</a>
                    <div class="dropdown-menu" aria-labelledby="optionsDropdown">
                        <a class="dropdown-item" href="#">Liste des catégories</a>
                        <a class="dropdown-item" href="#">Liste des statuts</a>
                        <a class="dropdown-item" href="#">Liste des priorités</a>
                        <a class="dropdown-item" href="">Autres</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('agent.profil')}}">Profil</a>
                </li>
                @elseif(Auth::user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.tickets')}}">Tickets</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.clients')}}">Clients</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.agents')}}">Agents</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.admins')}}">Admins</a>
                </li>

                <li class="nav-item dropdown" style="margin-left: 620px;">
                    <a class="nav-link dropdown-toggle" href="#" id="optionsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Paramètres</a>
                    <div class="dropdown-menu" aria-labelledby="optionsDropdown">
                        <a class="dropdown-item" href="{{route('admin.categories')}}">Liste des catégories</a>
                        <a class="dropdown-item" href="{{route('admin.statuts')}}">Liste des statuts</a>
                        <a class="dropdown-item" href="{{route('admin.priorites')}}">Liste des priorités</a>
                        <a class="dropdown-item" href="">Autres</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.profil')}}">Profil</a>
                </li>
                @endif
                @endif

                @guest
                <li class="nav-item" style="margin-left: 900px;">
                    <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register-user') }}">Créer un compte</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signout') }}">Se déconnecter</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>