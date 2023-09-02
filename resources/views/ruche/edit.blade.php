@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-md-6 mx-auto m-4 p-3 my-auto " id="new-ruche">
            <form action="{{ route('ruche.update', $ruche) }}" method="post">
                @csrf
                @method('put')
                
                <!--Modification d'une ruche-->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="fs-3 text-center">Modifier la ruche </h3>
                    </div>
                </div>


                <!--Nom de la ruche -->
                <div class="row">
                    <div class="col-md-12">
                        <label for="nom_ruche">Nom de la ruche :</label>
                        <select class="form-select  word-break: break-word @error('nom_ruche') is invalid @enderror" name="nom_ruche"
                            aria-label="Default select example">
                            <option value=""></option>
                            <option @if($ruche->nom_ruche == 'Ruche Dadant') selected @endif value="Ruche Dadant">Ruche Dadant</option>
                            <option @if($ruche->nom_ruche == 'Ruchette Dadant') selected @endif value="Ruchette Dadant">Ruchette Dadant</option>
                            <option @if($ruche->nom_ruche == 'Divisible Dadant') selected @endif value="Divisible Dadant">Divisible Dadant</option>
                            <option @if($ruche->nom_ruche == 'Ruche Langstroth') selected @endif value="Ruche Langstroth">Ruche Langstroth</option>
                            <option @if($ruche->nom_ruche == 'Ruchette Langstroth') selected @endif value="Ruchette Langstroth">Ruchette Langstroth</option>
                            <option @if($ruche->nom_ruche == 'Divisible Langstroth') selected @endif value="Divisible Langstroth">Divisible Langstroth</option>
                            <option @if($ruche->nom_ruche == 'Ruche bourbon') selected @endif value="Ruche bourbon">Ruche bourbon</option>
                            <option @if($ruche->nom_ruche == 'Ruchette bourbon') selected @endif value="Ruchette bourbon">Ruchette bourbon</option>
                            <option @if($ruche->nom_ruche == 'Ruche normalmaB') selected @endif value="Ruche normalmaB">Ruche normalB</option>
                            <option @if($ruche->nom_ruche == 'Warré') selected @endif value="Warré">Warré</option>
                            <option @if($ruche->nom_ruche == 'Ruche Kenyane') selected @endif value="Ruche Kenyane">Ruche Kenyane</option>
                            <option @if($ruche->nom_ruche == 'Layens') selected @endif value="Layens">Layens</option>
                            <option @if($ruche->nom_ruche == 'Ruche paille') selected @endif value="Ruche paille">Ruche paille</option>
                            <option @if($ruche->nom_ruche == 'Ruche tronc') selected @endif value="Ruche tronc">Ruche tronc</option>
                            <option @if($ruche->nom_ruche == 'Ruche armoire') selected @endif value="Ruche armoire">Ruche armoire</option>
                            <option @if($ruche->nom_ruche == 'Nucléi mini plus') selected @endif value="Nucléi mini plus">Nucléi mini plus</option>
                            <option @if($ruche->nom_ruche == 'Nucléi maxi plus') selected @endif value="Nucléi maxi plus">Nucléi maxi plus</option>
                            <option @if($ruche->nom_ruche == 'Nucléi apidéa') selected @endif value="Nucléi apidéa">Nucléi apidéa</option>
                            <option @if($ruche->nom_ruche == 'Nucléi kieler') selected @endif value="Nucléi kieler">Nucléi kieler</option>
                        </select>
                    </div>
                </div>
                @error('nom_ruche')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

                <!--Numéro de la ruche -->
                <div class="row">
                    <div class="col-md-12">
                        <label for="numero">Numéro :</label>
                        <input type="text" class="form-control @error('numero') is invalid @enderror " name="numero"
                            value="{{ $ruche->numero }}" />
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
                                aria-label="Default select example">
                                <option value=""></option>
                                <option @if($ruche->espece == 'Abeilles buckfasts') selected @endif value="Abeilles buckfasts"> Abeille buckfast (Apis mellifera buckfast)</option>
                                <option @if($ruche->espece == 'Abeilles noires') selected @endif value="Abeilles noires">Abeille noire européenne (Apis mellifera mellifera)</option>
                                <option @if($ruche->espece == 'Abeilles hybrides') selected @endif value="Abeilles hybrides">Abeilles hybridées</option>
                                <option @if($ruche->espece == 'Abeilles italiennes') selected @endif value="Abeilles italiennes">Abeille italienne (Apis mellifera ligustica)</option>
                                <option @if($ruche->espece == 'Abeilles caucasiennes') selected @endif value="Abeilles caucasiennes">Abeille caucasienne (Apis mellifera caucasica)</option>
                                <option @if($ruche->espece == 'Abeilles carnioliennes') selected @endif value="Abeilles carnioliennes">Abeille carniolienne (Apis mellifera carnica)</option>
                                <option @if($ruche->espece == 'Abeilles grecques') selected @endif value="Abeilles grecques">Abeille grecque (Apis mellifera cecropia)</option>
                                <option @if($ruche->espece == 'Abeilles de l\'orient') selected @endif value="Abeilles de l'orient">Abeille de l'orient (Apis mellifera syriaca)</option>
                                <option @if($ruche->espece == 'Abeilles maltaises') selected @endif value="Abeilles maltaises">Abeille maltaise (Apis mellifera ruttneri)</option>
                                <option @if($ruche->espece == 'Abeilles ibériques') selected @endif value="Abeilles ibériques">Abeille ibérique (Apis mellifera iberiensis)</option>
                                
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
                            aria-label="Default select example" value="{{ $ruche->provenance }}">
                            <option @if ($ruche->provenance == 'Ruche achetée') selected @endif value="">Ruche achetée</option>
                            <option @if ($ruche->provenance == 'Essaim') selected @endif value="Essaim">Essaim</option>
                            <option @if ($ruche->provenance == 'Division') selected @endif value="Division">Division</option>
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
                            name="lignee_reine" value="{{ $ruche->lignee_reine }}" />
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
                            name="nombre_cadres" value="{{ $ruche->nombre_cadres }}" />
                    </div>
                </div>
                @error('nombre_cadres')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

                <!--Formulaire de transfert d'une ruche sur un autre rucher -->

                <label class="mt-4" for="provenance">Transférer la ruche vers :</label>
                <select class="form-select @error('rucher_id') is invalid @enderror mt-2" name="rucher_id"
                    aria-label="Default select example">
                    @foreach ($user->ruchers as $rucher)
                        <option value="{{ $rucher->id }}">{{ $rucher->nom_rucher }}</option>
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
