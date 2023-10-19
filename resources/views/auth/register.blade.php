@extends('layouts.app')

@section('content')

<div class="container-fluid background-register position-relative" id="register" style="background-image:url(images/image-abeille-lavande.jpg)"; >
    
    <div class="row opacity-75 justify-content-center" id="inscription">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-3 ">{{ __('Inscription') }}</div>

                <!--Formulaire d'inscription-->
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!--Nom-->
                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end fs-3">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" placeholder="" class="form-control form-control-lg fs-3 @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--Prénom-->
                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end fs-3">{{ __('Prénom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" placeholder="" class="form-control form-control-lg fs-3 @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                                
                        <!--Email-->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end fs-3">{{ __('Adresse email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control-lg fs-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--Mot de passe-->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end fs-3">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-control-lg fs-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--Confirmation du mot de passe-->
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end fs-3">{{ __('Confirmation') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control form-control-lg fs-3" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!--Case à cocher pour accepter la politique de confidentialité-->
                        <div class="form-group row text-center">
                            <div class="col-md-10">
                                <label for="politique" class="fs-4">J'ai lu et j'accepte les
                                    <a href="{{ route('politique') }}">mentions légales et politique de confidentialité</a>
                                </label>
                            </div>
                            <div class="col-md-2 fs-3">
                                <input class="mx-auto form-check-input" type="checkbox" name="politique" id="politique" 
                                onclick="toggleValidationButtonDisplay()">
                            </div>



                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary btn-valider fs-3" id="valider" name="valider"
                                style ="visibility: hidden">
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


<script>
    function toggleValidationButtonDisplay(){
        let checkbox = document.getElementById("politique");
        let boutonValider = document.getElementById("valider");
        checkbox.checked ? boutonValider.style.visibility = "visible" : boutonValider.style.visibility = "hidden"
        }
    </script>
    
@endsection
