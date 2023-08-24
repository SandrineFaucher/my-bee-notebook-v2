@extends('layouts.app')

@section('content')
    <h1 class="text-center"> Mes ruchers </h1>

    <div class="container-fluid  mt-5 p-2">
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
                                <option value="Bois">Bois</option>
                                <option value="Champs cultivés">Champs cultivés</option>
                                <option value="Abords d'une rivière">Abords d'une rivière</option>
                                <option value="Montagne">Montagne</option>
                                <option value="Champ de Tournesol">Champs de tournesol</option>
                                <option value="Champ de colza">Champs de colza</option>
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


                    <!--Nombre de ruches-->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nombre_ruches">Nombre de ruches (1 à 100) :</label>
                            <input type="number" class="form-control @error('environnement') is invalid @enderror"
                                name="nombre_ruches" min="1" max="100" />
                        </div>
                    </div>
                    @error('nombre_ruches')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

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
                <div class="row">
                    @foreach ($user->ruchers as $rucher)
                    <a href="{{route('ruchers.show',$rucher)}}" class="link-underline-light"> 
                        <div class="col-md-3 m-3 p-3" id="rucher">
                             
                            <p>{{ $rucher->nom_rucher }}</p>
                            <p>{{ $rucher->environnement }}</p>
                            <p>{{ $rucher->nombre_ruches }}</p>

                            <div class="row">
                                <div class="col-md-5">
                                    <!--icon de modification du rucher-->
                                    <a href="{{ route('ruchers.edit', $rucher) }}">
                                         <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>

                                <div class="col-md-5">
                                    <!--icon de suppression du rucher-->
                                    <form action="{{ route('ruchers.destroy', $rucher) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn-delete"><i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>



        </div>

    </div>
@endsection
