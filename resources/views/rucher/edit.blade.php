@extends('layouts.app')


@section('content')
    <!--bouton retour-->
    <button class="btn btn-secondary mx-auto mt-3 text-center ms-5 mb-5"onclick="rtn()">Retour</button>

    <div class="row d-flex justify-content-around p-5">


        <div class="col-lg-3 m-4 p-3" id="new-rucher">
            <form action="{{ route('ruchers.update', $rucher) }}" method="post">
                @csrf
                @method('put')
                <!--passe du user connecté dans le formulaire-->
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <!--Ajout d'un rucher-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="fs-3">Modifier le rucher </h3>
                    </div>
                </div>


                <!--Nom ou numéro du rucher-->
                <div class="row">
                    <div class="col-md-12">
                        <label for="nom_rucher" class="fs-5">Nom du rucher :</label>
                        <input type="text"
                            class="form-control form-control-lg fs-5 word-break: break-word @error('nom_rucher') is invalid @enderror "
                            name="nom_rucher" value="{{ $rucher->nom_rucher }}" />
                    </div>
                </div>
                @error('nom_rucher')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

                <!--Environnement-->
                <div class="row">
                    <div class="col-md-12">
                        <label for="environnement" class="fs-5">Environnement :</label>
                        <select class="form-select form-select-lg fs-5 @error('environnement') is invalid @enderror"
                            name="environnement" aria-label="Default select example" value="{{ $rucher->environnement }}">
                            <option @if ($rucher->environnement == 'Foret') selected @endif value="Foret">Forêt</option>
                            <option @if ($rucher->environnement == 'Champs cultivés') selected @endif value="Champs cultivés">Champs
                                cultivés</option>
                            <option @if ($rucher->environnement == 'Montagne') selected @endif value="Montagne">Montagne</option>
                            <option @if ($rucher->environnement == 'Ville') selected @endif value="Ville">Ville</option>
                            <option @if ($rucher->environnement == 'Jardin privé') selected @endif value="Jardin privé">Jardin privé
                            </option>
                        </select>
                    </div>
                </div>
                @error('environnement')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

                <!--Adresse rucher-->
                <div class="row">
                    <div class="col-md-12">
                        <label for="adresse" class="fs-5">Adresse :</label>
                        <input type="text"
                            class="form-control form-control-lg fs-5 @error('adresse') is invalid @enderror" name="adresse"
                            value="{{ $rucher->adresse->adresse }}" />
                        @error('adresse')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <label for="ville" class="fs-5">Ville :</label>
                        <input type="text" class="form-control form-control-lg fs-5 @error('ville') is invalid @enderror"
                            name="ville" value="{{ $rucher->adresse->ville }}" />
                        @error('ville')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <label for="code_postal" class="fs-5">Code postal :</label>
                        <input type="text"
                            class="form-control form-control-lg fs-5 @error('code_postal') is invalid @enderror"
                            name="code_postal" value="{{ $rucher->adresse->code_postal }}" />
                        @error('code_postal')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <!--Modifier le rucher/ Valider-->
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center fs-5">
                    valider
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!--Script pour l'affichage du retour en arrière-->
    <script>
        function rtn() {
            window.history.back();
        }
    </script>
@endsection
