@extends('layouts.app')


@section('content')
<h1 class="text-center"> Visite de la Ruche </h1>

<div class="container-fluid">
<div class="row">


<!--Formulaire de visite-->
<div class="col-md-3" id="visite">
<h3 class="text-center">Création d'une visite</h3>
    <form action="{{ route('visites.store') }}" method="post">
    @csrf
    <!--passe ruche_id dans le formulaire-->
    <input type="hidden" name="ruche_id" value="{{ $ruche->id }}"> 

    <!--Champ date de la visite-->
    <div class="row">
        <div class="col-md-12 ">
            <label for="date_visite">Date de visite :</label>
            <input type="date" class="form-control @error('date_visite') is invalid @enderror "
                name="date_visite" />
        </div>
        @error('date_visite')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <!--Nombre cadres d'abeilles-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="nombre_cadres_abeilles">Nombre de cadres d'abeilles :</label>
            <input type="number" class="form-control @error('nombre_cadres_abeilles') is invalid @enderror "
                name="nombre_cadres_abeilles" />
        </div>
        @error('nombre_cadres_abeilles')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <!--Nombre cadres de couvain-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="nombre_cadres_couvain">Nombre de cadres de couvain :</label>
            <input type="number" class="form-control @error('nombre_cadres_couvain') is invalid @enderror "
                name="nombre_cadres_couvain" />
        </div>
        @error('nombre_cadres_couvain')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <!--Nombre cadres de miel-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="nombre_cadres_miel">Nombre de cadres de miel :</label>
            <input type="number" class="form-control @error('nombre_cadres_miel') is invalid @enderror "
                name="nombre_cadres_miel" />
        </div>
        @error('nombre_cadres_miel')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <!--Nombre de hausses-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="nombre_hausses">Nombre de hausses :</label>
            <input type="number" class="form-control @error('nombre_hausses') is invalid @enderror "
                name="nombre_hausses" />
        </div>
        @error('nombre_hausses')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <!--Reine vue-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="reine_vue">Reine vue :</label>
            <select class="form-select @error('reine_vue') is invalid @enderror" name="reine_vue"
                            aria-label="Default select example">
                            <option value="Oui"> Oui </option>
                            <option value="Non"> Non </option>
            </select>
            @error('reine_vue')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <!--Cellules royales-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="cellules_royales">Cellules royales :</label>
            <input type="number" class="form-control @error('cellules_royales') is invalid @enderror "
                name="cellules_royales" />
        </div>
        @error('cellules_royales')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <!--Ruche orpheline-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="reine_vue">Ruche orpheline :</label>
            <select class="form-select @error('reine_vue') is invalid @enderror" name="ruche_orpheline"
                            aria-label="Default select example">
                            <option value="Oui"> Oui </option>
                            <option value="Non"> Non </option>
                            <option value="A surveiller"> A surveiller </option>
            </select>
            @error('ruche_orpheline')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <!--Essaimage-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="reine_vue">Essaimage :</label>
            <select class="form-select @error('reine_vue') is invalid @enderror" name="essaimage"
                            aria-label="Default select example">
                            <option value="A essaimé"> A essaimé </option>
                            <option value="Peut essaimer"> Risque élevé d'essaimage </option>
            </select>
            @error('essaimage')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <!--Nourrissement-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="reine_vue">Nourrissement :</label>
            <select class="form-select @error('nourrissement') is invalid @enderror" name="nourrissement"
                            aria-label="Default select example">
                            <option value="sirop de glucose">Sirop de glucose  </option>
                            <option value="candy"> Pain de candy </option>
            </select>
            @error('nourrissement')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <!--Traitement-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="reine_vue">Traitement :</label>
            <select class="form-select @error('traitement') is invalid @enderror" name="traitement"
                            aria-label="Default select example">
                            <option value="Bande anti-varoa">Bande anti-varoa  </option>
                            <option value="Acide oxalyque"> Acide oxalique </option>
            </select>
            @error('traitement')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <!--Grille à reine-->
    <div class="row">
        <div class="col-md_12 mt-3">
            <label class="me-3" for="grille_reine">Grille à reine : </label>
            <div class="form-check form-switch">
                <input class="form-check-input @error('grille_reine') is invalid @enderror" type="checkbox" role="switch" id="flexSwitchCheckChecked"  name="grille_reine" value="1">
            </div> 
        </div>
        @error('grille_reine')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <!--Chasse abeilles-->
    <div class="row">
        <div class="col-md_12 mt-3">
            <label class="me-3" for="chasse_abeilles">Chasse abeilles : </label>
            <div class="form-check form-switch">
                <input class="form-check-input @error('chasse_abeilles') is invalid @enderror" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked name="chasse_abeilles" value="1">
            </div> 
        </div>
        @error('chasse_abeilles')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <!--Grille propolis-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="grille_propolis">Grilles à propolis :</label>
            <input type="number" class="form-control @error('grille_propolis') is invalid @enderror "
                name="grille_propolis" />
        </div>
        @error('cellules_royales')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <!--Force-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="force">Force de la ruche :</label>
            <input type="range" class=" @error('force') is invalid @enderror "
                name="force" min="0" max="10" />
        </div>
        @error('force')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <!--Commentaire-->
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="commentaire">Commentaire :</label>
            <textarea  class="form-control @error('commentaire') is invalid @enderror "
                name="commentaire" rows="5"></textarea>
        </div>
        @error('commentaire')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center ">
            valider
        </button>
    </div>


</form>
</div>   

</div>
</div>
@endsection