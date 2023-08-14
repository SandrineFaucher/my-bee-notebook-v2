@extends('layouts.app')


@section('content')
<h1 class="text-center"> Mon compte </h1>

<div class="row">

    <!--Titre encadré : registre-elevage-->
    <div class="col-md-3 ms-5 mt-5" id="registre-elevage">
        <h3 class="text-center">Registre d'élevage</h3>
        <h6 class="mb-5">* champs obligatoires pour générer le registre</h6>

        <!--Formulaire de création d'adresse-->
        <form action="{{route('adresses.store')}}" method="POST">
        @csrf
        @method('PUT')

              <!--Adresse-->
              <div class="col-12 mt-2 mb-3">
                <label for="inputAddress" class="form-label">Adresse *</label>
                <input type="text" class="form-control @error('adresse') is invalid @enderror" id="inputAddress" name="adresse">
              </div>
              @error('adresse')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror

              <!--Ville-->
              <div class="col-12 mt-2 mb-3">
                <label for="inputVille" class="form-label">Ville *</label>
                <input type="text" class="form-control @error('ville') is invalid @enderror" id="inputAddress" name="ville">
              </div>
              @error('ville')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror

              <!--Code-postal-->
              <div class="col-5 mt-2 mb-3">
                <label for="inputCodePostal" class="form-label">Code postal *</label>
                <input type="text" class="form-control @error('code_postal') is invalid @enderror" id="inputAddress" name="code_postal">
              </div>
              @error('code_postal')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror

              <!--Numéro Api-->
              <div class="col-5 mt-2 mb-3">
                <label for="inputNapi" class="form-label">N° Api *</label>
                <input type="text" class="form-control @error('napi') is invalid @enderror" id="inputAddress" name="code_postal">
              </div>
              @error('napi')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror

              <button type="submit" class="btn btn-primary mx-auto mt-3 text-center">
                Valider
              </button>
          </form>
    </div>

    <div class="col-md-3 ms-5 mt-5">
        <h3 class="text-center">Modifier mes informations</h3>
        
        <!--Formulaire de modifications nom + prenom + email + mot de passe-->
        <form action="{{route('users.update', $user)}}" method="POST">
        @method('put')
        @csrf

              <!--nom-->
              <div class="col-12 mt-2 mb-3">
                <label for="inputAddress" class="form-label">Nom </label>
                <input type="text" class="form-control @error('nom') is invalid @enderror" id="inputAddress" name="nom" value="{{$user->nom}}">
              </div>
              @error('nom')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror

              <!--prénom-->
              <div class="col-12 mt-2 mb-3">
                <label for="inputVille" class="form-label">Prénom </label>
                <input type="text" class="form-control @error('prenom') is invalid @enderror" id="inputAddress" name="prenom" value="{{$user->prenom}}">
              </div>
              @error('prenom')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror

              <!--email-->
              <div class="col-12 mt-2 mb-3">
                <label for="inputCodePostal" class="form-label">email</label>
                <input type="email" class="form-control @error('email') is invalid @enderror" id="inputAddress" name="email" value="{{$user->email}}">
              </div>
              @error('email')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror

              <button type="submit" class="btn btn-primary mx-auto mt-3 text-center">
                Modifier
              </button>
          </form>





    </div>
    <div class="col-md-3 ms-5 mt-5">
        <h3 class="text-center">Modifier mon mot de passe</h3>
        

        <!--Formulaire de modification du mot de passe-->
        <form method="POST" action="{{ route('updatepassword', $user) }}">
        @method('put')
        @csrf

              <!--Mot de passe actuel-->
              <div class="col-12 mt-2 mb-3">
                <label for="inputPassword" class="form-label">Mot de passe actuel</label>
                <input type="password" class="form-control @error('password') is invalid @enderror" placehoholder="Mot de passe actuel" id="inputAddress" name="actuel_password" value="{{ old('password') }}">
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror

              <!--Nouveau mot de passe-->
              <div class="col-12 mt-2 mb-3">
                <label for="inputPassword" class="form-label">Nouveau mot de passe</label>
                <input type="password" class="form-control @error('password') is invalid @enderror" id="inputPassword" name="nouveau_password" value="{{ old('password') }}">
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror

              <!--Confirmation du mot de passe-->
              <div class="col-12 mt-2 mb-3">
                <label for="inputPassword" class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control @error('password') is invalid @enderror" id="inputPassword" name="nouveau_password_confirmation" value="{{old('password') }}">
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror

              
              <button type="submit" class="btn btn-primary mx-auto mt-3 text-center">
                Modifier le mot de passe
              </button>
          </form>
    </div>

@endsection