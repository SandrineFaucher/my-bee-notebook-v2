@extends('layouts.app')

@section('content')
<div class="container-fluid" id="register" style="background-image:url(images/image-abeille-lavande.jpg)";>
    <div class="row justify-content-center row opacity-75 justify-content-center" id="connexion">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-3">{{ __('Connexion') }}</div>

                <!--Formulaire de connexion-->
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!--Adresse email-->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end fs-3">{{ __('Adresse email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror fs-3" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--Mot de passe-->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label fs-3 text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--Se souvenir de moi-->
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label fs-3" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!--Bouton valider-->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4" >
                                <button type="submit" class="btn btn-secondary fs-3">
                                    {{ __('Valider') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
