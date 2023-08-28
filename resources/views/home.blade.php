@extends('layouts.app')

@section('content')
    <h1 class="text-center"> Mes ruchers </h1>

    
        <div class="row d-flex justify-content-between">

            <div class="col-md-3 m-4 p-3" id="new-rucher">
                <form action="{{ route('ruchers.store') }}" method="post">
                    @csrf
                    <!--passe du user connecté dans le formulaire-->
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


                    <!--Ajout d'un rucher-->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="fs-3 text-center">Ajouter un rucher</p>
                        </div>
                    </div>


                    <!--Nom ou numéro du rucher-->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nom_rucher">Nom du rucher :</label>
                            <input type="text" class="form-control @error('nom_rucher') is invalid @enderror "
                                name="nom_rucher" />
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
                                aria-label="Default select example">
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
                            <label for="nom_rucher">Adresse :</label>
                            <input type="text" class="form-control @error('adresse') is invalid @enderror"
                                name="adresse" />
                            @error('adresse')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            <label for="nom_rucher">Ville :</label>
                            <input type="text" class="form-control @error('ville') is invalid @enderror"
                                name="ville" />
                            @error('ville')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            <label for="nom_rucher">Code postal :</label>
                            <input type="text" class="form-control @error('code_postal') is invalid @enderror"
                                name="code_postal" />
                            @error('code_postal')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    

                    <!--Créer le rucher/ Valider-->
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center ">
                            valider
                        </button>
                    </div>
                </form>
            </div>

            <!--Affichage des ruchers créés-->
            <div class="col-md-8 d-flex justify-content-between flex-wrap m-3" id="square-ruchers">
                
                <!--Boucle sur les ruchers du user connecté pour les afficher-->
                @foreach ($user->ruchers as $rucher)
                <div class="row mx-auto">


                    

                    <!--lien qui cadre le rucher afin d'afficher son détail par la fonction show du controller ruchers-->
                    <a href="{{route('ruchers.show',$rucher)}}" class="link-underline-light">

                    <!--Conditions pour affichage des badges d'environnement-->
                        <div class="col-md-3"   text-center" id="rucher">
                            <div class="col-md-10 ">
                                <img class= "w-50 h-50 mb-3" src="{{ asset('images/icone-ville-blanc.png') }}" alt="city-icon" id="icone-ville">
                                <p class="mx-auto">{{ $rucher->nom_rucher }}</p> 
                            </div>

                            
                            


                            

                            <div class="row mt-3 mx-auto">
                                <div class="col-md-5">
                                    <!--icon de modification du rucher-->
                                    <a href="{{ route('ruchers.edit', $rucher) }}">
                                         <i class="fa-sharp fa-solid fa-pen-to-square fs-3"></i>
                                    </a>
                                </div>

                                <div class="col-md-5">
                                    <!--icon de suppression du rucher-->
                                    <form action="{{ route('ruchers.destroy', $rucher) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn-delete"><i class="fa-solid fa-circle-xmark fs-3"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </a>
                    </div>
                    @endforeach
                
            </div>



        </div>

    
@endsection
