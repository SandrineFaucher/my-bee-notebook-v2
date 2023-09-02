@extends('layouts.app')


@section('content')
<div class="row">


<div class="col-lg-3 m-4 p-3 mx-auto" id="new-rucher">
    <form action="{{route('ruchers.update', $rucher)}}" method="post">
    @csrf 
    @method('put')
    <!--passe du user connecté dans le formulaire-->
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

        <!--Ajout d'un rucher-->
        <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="fs-3">Modifier le rucher </h3>
        </div>
        </div>


        <!--Nom ou numéro du rucher-->
        <div class="row">
        <div class="col-md-12">
            <label for="nom_rucher">Nom du rucher :</label>
            <input type="text" class="form-control word-break: break-word @error('nom_rucher') is invalid @enderror "
                name="nom_rucher" value="{{$rucher->nom_rucher}}"/>
        </div>
        </div>
        @error('nom_rucher')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <!--Environnement-->
        <div class="row">
        <div class="col-md-12">
            <label for="nom_rucher">Environnement :</label>
            <select class="form-select @error('environnement') is invalid @enderror" name="environnement"
                aria-label="Default select example" value="{{$rucher->environnement}}">
                <option @if($rucher->environnement == 'Foret') selected @endif value="Foret">Forêt</option>
                <option @if($rucher->environnement == 'Champs cultivés') selected @endif value="Champs cultivés">Champs cultivés</option>
                <option @if($rucher->environnement == 'Montagne') selected @endif value="Montagne">Montagne</option>
                <option @if($rucher->environnement == 'Ville') selected @endif value="Ville">Ville</option>
                <option @if($rucher->environnement == 'Jardin privé') selected @endif value="Jardin privé">Jardin privé</option>
            </select>
        </div>
        </div>
        @error('environnement')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <!--Adresse rucher-->
        <div class="row">
        <div class="col-md-12">
            <label for="nom_rucher">Adresse :</label>
            <input type="text" class="form-control @error('adresse') is invalid @enderror" name="adresse" value="{{$rucher->adresse->adresse}}"/>
            @error('adresse')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <label for="nom_rucher">Ville :</label>
            <input type="text" class="form-control @error('ville') is invalid @enderror" name="ville" value="{{$rucher->adresse->ville}}"/>
            @error('ville')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <label for="nom_rucher">Code postal :</label>
            <input type="text" class="form-control @error('code_postal') is invalid @enderror"
                name="code_postal" value="{{$rucher->adresse->code_postal}}" />
            @error('code_postal')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        </div> 


        <!--Modifier le rucher/ Valider-->
        <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center">
            Modifier
        </button>
    </form>
    </div>
</div>



@endsection