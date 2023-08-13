@extends('layouts.app')


@section('content')
<h1 class="text-center"> Mon compte </h1>

<div class="row">
    <div class="col-md-3 ms-5 mt-5" id="registre-elevage">
        <h3 class="text-center">Registre d'élevage</h3>
        <form action="{{route('users.store')}}" method="POST">
              <div class="col-9 mt-2">
                <label for="inputAddress" class="form-label">Adresse *</label>
                <input type="text" class="form-control" id="inputAddress" name="adresse">
              </div>
              <div class="col-9 mt-2">
                <label for="inputVille" class="form-label">Ville *</label>
                <input type="text" class="form-control" id="inputAddress" name="ville">
              </div>
              <div class="col-5 mt-2">
                <label for="inputCodePostal" class="form-label">Code postal *</label>
                <input type="text" class="form-control" id="inputAddress" name="code_postal">
              </div>
              <div class="col-5 mt-2">
                <label for="inputNapi" class="form-label">Napi *</label>
                <input type="text" class="form-control" id="inputAddress" name="code_postal">
              </div>
              
              <button type="submit" class="btn btn-primary mx-auto mt-3 text-center">
                Valider
              </button>
              
        </form>
    </div>
    <div class="col-md-3">
        
    </div>
    <div class="col-md-3">
        
    </div>


@endsection