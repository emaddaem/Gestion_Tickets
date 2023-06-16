@extends('base')
@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex flex-column justify-content-between">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-5 col-md-10 ">
                <div class="card card-default mb-0">
                    <div class="card-header pb-0">
                        <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                            <a class="w-auto pl-0" href="/index.html">
                                <!-- <img src="images/logo.png" alt="Mono"> -->
                                <span class="brand-name text-dark">Bienvenue</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-5 pt-0">
                        <h4 class="text-dark text-center mb-5">Créez votre compte</h4>
                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Champ caché pour l'identifiant de l'entreprise -->
                                <input type="hidden" name="entreprise_id" value="{{ $entreprise ? $entreprise->id : null }}">
                                
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control input-lg" id="name" name="nom" aria-describedby="nameHelp" placeholder="Nom">
                                    @if (isset($errors) && $errors->has('nom'))
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" placeholder="Prénom" id="prenom" class="form-control" name="prenom" required autofocus>
                                    @if (isset($errors) && $errors->has('prenom'))
                                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="email" class="form-control input-lg" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
                                    @if (isset($errors) && $errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="number" placeholder="Numéro de téléphone" id="telephone" class="form-control" name="telephone" required autofocus>
                                    @if (isset($errors) && $errors->has('telephone'))
                                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="password" placeholder="Mot de passe" id="password" class="form-control" name="password" required>
                                    @if (isset($errors) && $errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between mb-3">

                                        <!-- <div class="custom-control custom-checkbox mr-3 mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">I Agree the terms and conditions.</label>
                                        </div> -->

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-pill mb-4">S'inscrire</button>

                                    <p>Vous avez déja un compte?
                                        <a class="text-blue" href="{{ route('login', 'aucune') }}">Se connecter</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection