@extends('layouts.app')


@section('content')

<!--bouton retour-->
<button class="btn btn-secondary mx-auto mt-3 text-center ms-5 mb-5"onclick="rtn()">Retour</button>

<div class="container fluid p-5 ">
    <div class="row">
<!--Formulaire de visite-->
<div class="col-md-6 mx-auto" id="visite">
    <h3 class="text-center">Modifier la visite</h3>
    <form action="{{ route('visites.update', $visite) }}" method="post">
        @csrf
        @method('put')

        
        <!--Champ date de la visite-->
        <div class="row">
            <div class="col-md-12 ">
                <label for="date_visite" class="fs-5">Date de visite : </label>
                <input type="date" class="form-control form-control-lg fs-5 @error('date_visite') is invalid @enderror "
                    name="date_visite" value="{{$visite->date_visite}}"/>
            </div>
            @error('date_visite')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!--Nombre cadres d'abeilles-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="nombre_cadres_abeilles" class="fs-5">Nombre de cadres d'abeilles :</label>
                <input type="number"
                    class="form-control form-control-lg fs-5 @error('nombre_cadres_abeilles') is invalid @enderror "
                    name="nombre_cadres_abeilles" value="{{$visite->nombre_cadres_abeilles}}"/>
            </div>
            @error('nombre_cadres_abeilles')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!--Nombre cadres de couvain-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="nombre_cadres_couvain" class="fs-5">Nombre de cadres de couvain :</label>
                <input type="number" class="form-control form-control-lg fs-5 @error('nombre_cadres_couvain') is invalid @enderror "
                    name="nombre_cadres_couvain" value="{{$visite->nombre_cadres_couvain}}"/>
            </div>
            @error('nombre_cadres_couvain')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!--Nombre cadres de miel-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="nombre_cadres_miel" class="fs-5">Nombre de cadres de miel :</label>
                <input type="number" class="form-control form-control-lg fs-5 @error('nombre_cadres_miel') is invalid @enderror "
                    name="nombre_cadres_miel" value="{{$visite->nombre_cadres_miel}}"/>
            </div>
            @error('nombre_cadres_miel')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!--Nombre de hausses-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="nombre_hausses" class="fs-5">Nombre de hausses :</label>
                <input type="number" class="form-control form-control-lg fs-5 @error('nombre_hausses') is invalid @enderror "
                    name="nombre_hausses" value="{{$visite->nombre_hausses}}"/>
            </div>
            @error('nombre_hausses')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!--Reine vue-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="reine_vue" class="fs-5">Reine vue :</label>
                <select class="form-select form-select-lg fs-5 @error('reine_vue') is invalid @enderror" name="reine_vue"
                    aria-label="Default select example" value="{{$visite->reine_vue}}">
                    <option @if($visite->reine_vue == 'Oui') selected @endif value="Oui"> Oui </option>
                    <option @if($visite->reine_vue == 'Non') selected @endif value="Non"> Non </option>
                </select>
                @error('reine_vue')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!--Cellules royales-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="cellules_royales" class="fs-5">Cellules royales :</label>
                <input type="number" class="form-control form-control-lg fs-5 @error('cellules_royales') is invalid @enderror "
                    name="cellules_royales" value="{{$visite->cellules_royales}}"/>
            </div>
            @error('cellules_royales')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!--Ruche orpheline-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="ruche_orpheline" class="fs-5">Ruche orpheline :</label>
                <select class="form-select form-select-lg fs-5 @error('reine_vue') is invalid @enderror" name="ruche_orpheline"
                    aria-label="Default select example" value="{{$visite->ruche_orpheline}}">
                    <option value=""></option>
                    <option @if($visite->ruche_orpheline == 'Oui') selected @endif value="Oui"> Oui </option>
                    <option @if($visite->ruche_orpheline == 'Non') selected @endif value="Non"> Non </option>
                    <option @if($visite->ruche_orpheline == 'A surveiller') selected @endif value="A surveiller"> A surveiller </option>
                </select>
                @error('ruche_orpheline')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!--Essaimage-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="essaimage" class="fs-5">Essaimage :</label>
                <select class="form-select form-select-lg fs-5 @error('reine_vue') is invalid @enderror" name="essaimage"
                    aria-label="Default select example" value="{{$visite->essaimage}}">
                    <option @if($visite->essaimage == 'A surveiller') selected @endif value="Peut essaimer"> A surveiller </option>
                    <option @if($visite->essaimage == 'A essaimé') selected @endif value="A essaimé"> A essaimé </option>
                    <option @if($visite->essaimage == 'Risque élevé d\'essaimage') selected @endif value="Peut essaimer"> Risque élevé d'essaimage </option>
                </select>
                @error('essaimage')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!--Nourrissement-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="nourrissement" class="fs-5">Nourrissement :</label>
                <select class="form-select form-select-lg fs-5 @error('nourrissement') is invalid @enderror" name="nourrissement"
                    aria-label="Default select example" value="{{$visite->nourrissement}}">
                    <option @if($visite->nourrissement == 'sirop de glucose') selected @endif value="sirop de glucose">Sirop de glucose </option>
                    <option @if($visite->nourrissement == 'candy') selected @endif value="pain de candy"> Pain de candy </option>
                </select>
                @error('nourrissement')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!--Traitement-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="traitement" class="fs-5">Traitement :</label>
                <select class="form-select form-select-lg fs-5 @error('traitement') is invalid @enderror" name="traitement"
                    aria-label="Default select example" value="{{$visite->traitement}}">
                    <option @if($visite->traitement == 'Bande anti-varoa') selected @endif value="Bande anti-varoa">Bande anti-varoa </option>
                    <option @if($visite->traitement == 'Acide oxalyque') selected @endif value="Acide oxalyque"> Acide oxalique </option>
                </select>
                @error('traitement')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!--Détail du traitement-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="commentaire" class="fs-5">Détail du traitement :</label>
                <textarea class="form-control form-control-lg fs-5 @error('detail_traitement') is invalid @enderror " name="detail_traitement" rows="5">{{$visite->detail_traitement}}</textarea>
            </div>
            @error('detail_traitement')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>


        <!--Grille à reine-->
        <div class="row">
            <div class="col-md_12 mt-3">
                <label class="me-3 fs-5" for="grille_reine">Grille à reine : </label>
                <div class="form-check form-switch fs-5">
                    <input class="form-check-input @error('grille_reine') is invalid @enderror"
                        type="checkbox" role="switch" id="flexSwitchCheckChecked" name="grille_reine"
                        value="{{$visite->grille_reine}}">
                </div>
            </div>
            @error('grille_reine')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!--Chasse abeilles-->
        <div class="row">
            <div class="col-md_12 mt-3">
                <label class="me-3 fs-5" for="chasse_abeilles">Chasse abeilles : </label>
                <div class="form-check form-switch fs-5">
                    <input class="form-check-input @error('chasse_abeilles') is invalid @enderror"
                        type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                        name="chasse_abeilles" value="{{$visite->chasse_abeilles}}">
                </div>
            </div>
            @error('chasse_abeilles')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!--Grille propolis-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="grille_propolis" class="fs-5">Grilles à propolis :</label>
                <input type="number" class="form-control form-control-lg fs-5 @error('grille_propolis') is invalid @enderror "
                    name="grille_propolis" value="{{$visite->grille_propolis}}"/>
            </div>
            @error('cellules_royales')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!--Force-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="force" class="fs-5">Force de la ruche :</label>
                <input type="range" class="fs-5" @error('force') is invalid @enderror " name="force"
                    min="0" max="10" value="{{$visite->force}}"/>
            </div>
            @error('force')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!--Commentaire-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="commentaire" class="fs-5">Commentaire :</label>
                <textarea class="form-control form-control-lg fs-5 @error('commentaire') is invalid @enderror " name="commentaire" rows="5" >{{$visite->commentaire}}</textarea>
            </div>
            @error('commentaire')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center fs-5">
                Modifier
            </button>
        </div>
    </form>
</div>
</div>
</div>

<!--Script pour l'affichage du retour en arrière-->
<script>
    function rtn() {
       window.history.back();
    }
</script> 
@endsection