@extends('base')
@section('content')

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex flex-column justify-content-between">
        @include('includes.success')
        @include('includes.errors')
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="card card-default mb-0">
                    <div class="card-header pb-0">
                        <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                            <a class="w-auto pl-0" href="/index.html">
                                @if($entreprise && $entreprise->logo)
                                <img src="{{ asset('images/logos/' . $entreprise->logo) }}"  alt="{{ $entreprise->nom }}" />
                                @else
                                <span class="brand-name text-dark">Bienvenue</span>
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-5 pt-0">

                        <h4 class="text-dark mb-6 text-center">Connectez-vous</h4>

                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="row">
                                <!-- Champ caché pour l'identifiant de l'entreprise -->
                                <input type="hidden" name="entreprise_id" value="{{ $entreprise ? $entreprise->id : null }}">

                                <div class="form-group col-md-12 mb-4">
                                    <input type="email" class="form-control input-lg" name="email" id="email" aria-describedby="emailHelp" placeholder="email">
                                    @if (isset($errors) && $errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 ">
                                    <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
                                    @if (isset($errors) && $errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">

                                    <div class="d-flex justify-content-between mb-3">

                                        <div class="custom-control custom-checkbox mr-3 mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Se rappeler de moi</label>
                                        </div>

                                        <a class="text-color" href="#"> Mot de passe oublié ?</a>

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-pill mb-4">Se connecter</button>

                                    @php
                                    $entreprise_URL = request()->segment(2);
                                    @endphp
                                    <p>Vous n'avez pas encore de compte ?
                                        <a class="text-blue" href="{{ route('register-user', $entreprise_URL) }}">S'inscrire</a>
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