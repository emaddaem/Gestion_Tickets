@extends('base')
@section('content')
<main class="signup-form">
    <div class="signup-form-container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="row justify-content-center">
                    <div class="card">
                        <h3 class="card-header text-center">Inscrivez-vous</h3>
                        <div class="card-body">
                            <form action="{{ route('register.custom') }}" method="POST">
                                @csrf
                                <div class="form-group mb-4">
                                    <input type="text" placeholder="Nom" id="nom" class="form-control" name="nom" required autofocus>
                                    @if (isset($errors) && $errors->has('nom'))
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" placeholder="Prénom" id="prenom" class="form-control" name="prenom" required autofocus>
                                    @if (isset($errors) && $errors->has('prenom'))
                                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control" name="email" required autofocus>
                                    @if (isset($errors) && $errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-4">
                                    <input type="number" placeholder="Numéro de téléphone" id="telephone" class="form-control" name="telephone" required autofocus>
                                    @if (isset($errors) && $errors->has('telephone'))
                                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    @if (isset($errors) && $errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-4">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember"> Remember Me</label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">S'inscrire</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection