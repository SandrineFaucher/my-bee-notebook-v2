@extends('layouts.app')


@section('content')
<!--Titre encadré : registre-elevage-->
<div class="col-lg-3 p-3    mt-5" id="registre-elevage">
    <h3 class="text-center">Registre d'élevage</h3>
    <h6 class="mb-5">* champs obligatoires pour générer le registre</h6>

    <!--Formulaire de création d'adresse-->
    <form action="{{route('adresses.update', $adresse)}}" method="post">
    @csrf
    @method('put')
    
          <!--Adresse-->
          <div class="col-md-12 mt-2 mb-3">
            <label for="inputAddress" class="form-label">Adresse *</label>
            <input type="text" class="form-control @error('adresse') is invalid @enderror" id="inputAddresse" name="adresse" value="">
          </div>
          @error('adresse')
          <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
          @enderror

          <!--Ville-->
          <div class="col-md-12 mt-2 mb-3">
            <label for="inputVille" class="form-label">Ville *</label>
            <input type="text" class="form-control @error('ville') is invalid @enderror" id="inputVille" name="ville">
          </div>
          @error('ville')
          <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
          @enderror

          <!--Code-postal-->
          <div class="col-md-5 mt-2 mb-3">
            <label for="inputCodePostal" class="form-label">Code postal *</label>
            <input type="text" class="form-control @error('code_postal') is invalid @enderror" id="inputCodePostal" name="code_postal">
          </div>
          @error('code_postal')
          <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
          @enderror

          <!--Numéro Api-->
          <div class="col-md-5 mt-2 mb-3">
            <label for="inputNapi" class="form-label">N° Api *</label>
            <input type="text" class="form-control @error('napi') is invalid @enderror" id="inputNapi" name="napi">
          </div>
          @error('napi')
          <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
          @enderror
          
          <div class="text-center">
          <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center">
            Valider la nouvelle adresse
          </button>
        </div>
      </form>

      
        
</div>

@endsection