@extends('layouts.app')


@section('content')
<div class="container mx-auto">
<div class="col-md-3 m-4 p-3" id="new-ruche">
    <form action="{{route('ruche.update', $ruche)}}" method="post">
        @csrf
        @method('put')

        
        <!--Modification d'une ruche-->
        <div class="row">
            <div class="col-md-12">
                <p class="fs-3 text-center">Modifier la ruche </p>
            </div>
        </div>


        <!--Nom de la ruche -->
        <div class="row">
            <div class="col-md-12">
                <label for="nom_ruche">Nom de la ruche :</label>
                <input type="text" class="form-control @error('nom_ruche') is invalid @enderror "
                    name="nom_ruche" value="{{$ruche->nom_ruche}}"/>
            </div>
        </div>
        @error('nom_ruche')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <!--Numéro de la ruche -->
        <div class="row">
            <div class="col-md-12">
                <label for="numero">Numéro :</label>
                <input type="text" class="form-control @error('numero') is invalid @enderror "
                    name="numero" value="{{$ruche->numero}}"/>
            </div>
        </div>
        @error('numero')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror


        <!--Espèce-->
        <div class="row">
            <div class="col-md-12">
                <label for="espece">Espèce :</label>
                <select class="form-select @error('espece') is invalid @enderror" name="espece"
                    aria-label="Default select example" value="{{$ruche->espece}}">
                    <option value=""></option>
                    <option @if($ruche->espece == 'Buckfast') selected @endif value="Buckfast">Buckfast</option>
                    <option @if($ruche->espece == 'Abeilles noires') selected @endif value="Abeilles noires">Abeilles noires</option>
                    <option @if($ruche->espece == 'Abeilles hybrides') selected @endif value="Abeilles hybrides">Abeilles hybrides</option>
                </select>
            </div>
        </div>
        @error('espece')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <!--Provenance-->
        <div class="row">
            <div class="col-md-12">
                <label for="provenance">Provenance :</label>
                <select class="form-select @error('provenance') is invalid @enderror" name="provenance"
                    aria-label="Default select example" value="{{$ruche->provenance}}">
                    <option @if($ruche->provenance == 'Ruche achetée') selected @endif value="">Ruche achetée</option>
                    <option @if($ruche->provenance == 'Essaim') selected @endif value="Essaim">Essaim</option>
                    <option @if($ruche->provenance == 'Division') selected @endif value="Division">Division</option>
                </select>
            </div>
        </div>
        @error('espece')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

     <!--Lignée reine -->
     <div class="row">
        <div class="col-md-12">
            <label for="lignee_reine">Lignée :</label>
            <input type="text" class="form-control @error('lignee_reine') is invalid @enderror "
                name="lignee_reine" value="{{$ruche->lignee_reine}}"/>
        </div>
    </div>
    @error('lignée_reine')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror

    <!--Nombre de cadres -->
    <div class="row">
        <div class="col-md-12">
            <label for="nombre_cadres">Nombre de cadres :</label>
            <input type="number" class="form-control @error('nombre_cadres') is invalid @enderror "
                name="nombre_cadres" value="{{$ruche->nombre_cadres}}"/>
        </div>
    </div>
    @error('nombre_cadres')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror

    <!--Formulaire de transfert d'une ruche sur un autre rucher -->
    
    <label class="mt-4" for="provenance">Transférer la ruche vers :</label>
    <select class="form-select @error('rucher_id') is invalid @enderror mt-2" name="rucher_id"
     aria-label="Default select example" >
     @foreach ($user->ruchers as $rucher)
     <option value="{{$rucher->id}}" >{{$rucher->nom_rucher}}</option>
     @endforeach
    </select>
    @error('rucher_id')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror

        <!--Valider la ruche-->
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center ">
                Modifier
            </button>
        </div>
    </form>

    
       

</div>
@endsection