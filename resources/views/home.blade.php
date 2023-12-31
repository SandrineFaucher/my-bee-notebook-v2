@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5 pt-5"> Mes ruchers </h1>
    
        <div class="row d-flex justify-content-around p-5">

            <div class="col-xl-3 m-4 p-3" >
                <form action="{{ route('ruchers.store') }}" method="post" id="new-rucher">
                    @csrf
                    <!--passage du user connecté dans le formulaire-->
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <!--Ajout d'un rucher-->
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="fs-3 text-center mb-3">Ajouter un rucher</h3>
                        </div>
                    </div>

                    <!--Nom ou numéro du rucher-->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nom_rucher" class="fs-5">Nom du rucher :</label>
                            <input type="text" class="form-control form-control-lg fs-5 word-break: break-word @error('nom_rucher') is invalid @enderror" 
                                name="nom_rucher" />
                        </div>
                    </div>
                    @error('nom_rucher')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <!--Environnement-->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nom_rucher" class="fs-5">Environnement :</label>
                            <select class="form-select form-select-lg fs-5 @error('environnement') is invalid @enderror" name="environnement"
                                aria-label="Default select example">
                                <option value=""></option>
                                <option value="Foret">Foret</option>
                                <option value="Champs cultivés">Champs cultivés</option>
                                <option value="Jardin privé">Jardin privé</option>
                                <option value="Montagne">Montagne</option>
                                <option value="Ville">Ville</option>
                            </select>
                        </div>
                    </div>
                    @error('environnement')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <!--Adresse rucher-->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nom_rucher" class="fs-5">Adresse :</label>
                            <input type="text" class="form-control form-control-lg fs-5 @error('adresse') is invalid @enderror"
                                name="adresse" />
                            @error('adresse')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            <label for="nom_rucher" class="fs-5">Ville :</label>
                            <input type="text" class="form-control form-control-lg fs-5 @error('ville') is invalid @enderror"
                                name="ville" />
                            @error('ville')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            <label for="nom_rucher" class="fs-5">Code postal :</label>
                            <input type="text" class="form-control form-control-lg fs-5 @error('code_postal') is invalid @enderror"
                                name="code_postal" />
                            @error('code_postal')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    

                    <!--Créer le rucher/ Valider-->
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center fs-5">
                            valider
                        </button>
                    </div>
                </form>
            </div>

            <!--Affichage des ruchers créés-->
            <div class="col-lg-8 d-flex justify-content-center flex-wrap m-3" id="square-ruchers">
                
                <!--Boucle sur les ruchers du user connecté pour les afficher-->
                @foreach ($user->ruchers as $rucher)
                <div class="row mx-auto my-auto">

                    <!--lien qui cadre le rucher afin d'afficher son détail par la fonction show du controller ruchers-->
                    <a href="{{route('ruchers.show',$rucher)}}" class="link-underline-light">

                    <!--Conditions pour affichage des badges d'environnement-->
                        <div class="col-md-3 badge text-center mt-3" id="rucher">
                            <div class="col-md-10 mx-auto ">
                                @if($rucher->environnement == 'Ville')
                                <img class= "w-50 h-50 mb-3" src="{{ asset('images/icone-ville-blanc.png') }}" alt="city-icon">
                                @elseif($rucher->environnement == 'Foret')
                                <img class= "w-50 h-50 mb-3" src="{{ asset('images/icone-foret-blanc.png') }}" alt="forest-icon">
                                @elseif($rucher->environnement == 'Champs cultivés')
                                <img class= "w-50 h-50 mb-3" src="{{ asset('images/icone-champ-blanc.png') }}" alt="field-icon">
                                @elseif($rucher->environnement == 'Montagne')
                                <img class= "w-50 h-50 mb-3" src="{{ asset('images/icone-montagne-blanc.png') }}" alt="mountain-icon">
                                @elseif($rucher->environnement == 'Jardin privé')
                                <img class= "w-50 h-50 mb-3" src="{{ asset('images/icone-jardin-blanc.png') }}" alt="garden-icon">
                                @endif
                                <div class="row text-center d-flex flex-wrap">
                                <div class="col-md-10 mx-auto fs-5 text-wrap">
                                    {{ $rucher->nom_rucher }}
                                </div>
                                </div> 
                            </div>
                          
                            <!--Affichage des icones de modification et de suppression-->
                            <div class="row mt-4 text-center ">
                                <div class="d-flex flex-nowrap ">
                                <div class="col-md-5 mx-auto pe-2">
                                    <!--icon de modification du rucher-->
                                    <a href="{{ route('ruchers.edit', $rucher) }}">
                                         <i class="fa-sharp fa-solid fa-pen-to-square fs-5" title="Modifier"></i>
                                    </a>
                                </div>

                                <div class="col-md-5 mx-auto ps-3 ">
                                    <!--icon de suppression du rucher-->
                                    <form action="{{ route('ruchers.destroy', $rucher) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn-delete"><i class="fa-solid fa-circle-xmark fs-5" title="Supprimer"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    @endforeach
            </div>
        </div>   
@endsection
