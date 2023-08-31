@extends('layouts.app')


@section('content')
    <h1 class="text-center">Rucher : {{ $rucher->nom_rucher }}</h1>

    <div class="container-fluid  mt-5 p-2">
        <div class="row d-flex justify-content-between">
            <div class="col-md-3 m-4 p-3" id="new-ruche">

                <!--Formulaire d'ajout d'une ruche-->
                <form action="{{ route('ruche.store') }}" method="post">
                    @csrf
                    <!--passe rucher_id dans le formulaire-->
                    <input type="hidden" name="rucher_id" value="{{ $rucher->id }}">


                    <!--Ajout d'une ruche-->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="fs-3 text-center">Ajouter une ruche</p>
                        </div>
                    </div>


                    <!--Nom de la ruche -->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nom_ruche">Nom de la ruche :</label>
                            <select class="form-select @error('nom_ruche') is invalid @enderror" name="nom_ruche"
                                aria-label="Default select example">
                                <option value=""></option>
                                <option value="Ruche Dadant">Ruche Dadant</option>
                                <option value="Ruchette Dadant">Ruchette Dadant</option>
                                <option value="Divisible Dadant">Divisible Dadant</option>
                                <option value="Ruche Langstroth">Ruche Langstroth</option>
                                <option value="Ruchette Langstroth">Ruchette Langstroth</option>
                                <option value="Divisible Langstroth">Divisible Langstroth</option>
                                <option value="Ruche bourbon">Ruche bourbon</option>
                                <option value="Ruchette bourbon">Ruchette bourbon</option>
                                <option value="Ruche normalmaB">Ruche normalB</option>
                                <option value="Warré">Warré</option>
                                <option value="Ruche Kenyane">Ruche Kenyane</option>
                                <option value="Layens">Layens</option>
                                <option value="Ruche paille">Ruche paille</option>
                                <option value="Ruche tronc">Ruche tronc</option>
                                <option value="Ruche armoire">Ruche armoire</option>
                                <option value="Nucléi mini plus">Nucléi mini plus</option>
                                <option value="Nucléi maxi plus">Nucléi maxi plus</option>
                                <option value="Nucléi apidéa">Nucléi apidéa</option>
                                <option value="Nucléi kieler">Nucléi kieler</option>
                            </select>
                        </div>
                    </div>
                    @error('nom_ruche')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <!--Nombre de cadres -->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nombre_cadres">Nombre de cadres :</label>
                            <input type="number" class="form-control @error('nombre_cadres') is invalid @enderror "
                                name="nombre_cadres" />
                        </div>
                    </div>
                    @error('nombre_cadres')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <!--Numéro de la ruche -->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="numero">Numéro :</label>
                            <input type="text" class="form-control @error('numero') is invalid @enderror "
                                name="numero" />
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
                                <option value="Abeilles buckfasts">Buckfast (Apis mellifera buckfast)</option>
                                <option value="Abeilles noires">Abeille noire européenne (Apis mellifera mellifera)</option>
                                <option value="Abeilles hybrides">Abeilles hybridées</option>
                                <option value="Abeilles italiennes">Abeille italienne (Apis mellifera ligustica)</option>
                                <option value="Abeilles caucasiennes">Abeille caucasienne (Apis mellifera caucasica)</option>
                                <option value="Abeilles carnioliennes">Abeille carniolienne (Apis mellifera carnica)</option>
                                <option value="Abeilles grecques">Abeille grecque (Apis mellifera cecropia)</option>
                                <option value="Abeilles de l'orient">Abeille de l'orient (Apis mellifera syriaca)</option>
                                <option value="Abeilles maltaises">Abeille maltaise (Apis mellifera ruttneri)</option>
                                <option value="Abeilles ibériques">Abeille ibérique (Apis mellifera iberiensis)</option>
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
                                aria-label="Default select example">
                                <option value=""></option>
                                <option value="Produit d'une division">Produit d'une division</option>
                                <option value="Essaim cueilli">Essaim cueilli</option>
                                <option value="Essaim acheté">Essaim acheté</option>
                            </select>
                        </div>
                    </div>
                    @error('provenance')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <!--Lignée reine -->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="lignee_reine">Lignée :</label>
                            <input type="text" class="form-control @error('lignee_reine') is invalid @enderror "
                                name="lignee_reine" />
                        </div>
                    </div>
                    @error('lignée_reine')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror



                    <!--Valider la ruche-->
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center ">
                            valider
                        </button>
                    </div>
                </form>
            </div>



            <div class="col-md-8 d-flex justify-content-center flex-wrap" id="square-ruches">
                @foreach ($rucher->ruches as $ruche)
                    <!--Affichage des ruches appartenant au rucher -->

                    <a href="{{ route('ruche.show', $ruche) }}">
                        <div class="col-md-2 m-1 badge fs-6" id="ruche">
                            <div class="row text-center">
                                <div class="col-md-12 ">
                                    <img src="{{ asset('images/icone-ruche-charbon.png') }}" alt="ruche"
                                        id="icone-ruche">
                                    <p>{{$ruche->nom_ruche }}</p>
                                    <p>{{$ruche->nombre_cadres }} cadres </p>
                                    <p>N° : {{$ruche->numero}}</p>
                                    <p>{{$ruche->espece }}</p>
                                    <p>{{$ruche->provenance}}</p>
                                    <p>{{$ruche->lignee_reine}}</p>
                                    
                                </div>
                            </div>


                            <!--Affichage des icones de modification et de suppression-->
                            <div class="row">
                                <div class="d-flex flex-nowrap justify-content-between"> 
                                <!--icon de modification d'une ruche-->
                                <div class="col-md-3 mx-auto fs-4">
                                    <a href="{{ route('ruche.edit', $ruche) }}">
                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>

                                <!--icon de suppression d'une ruche-->
                                <div class="col-md-3 mx-auto fs-4">
                                    <form action="{{ route('ruche.destroy', $ruche) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn-delete"><i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
@endsection
