@extends('layouts.app')


@section('content')


<h1 class="text-center">Rucher : {{$rucher->nom_rucher}}</h1>

<div class="container-fluid  mt-5 p-2">
    <div class="row d-flex justify-content-between">   
        <div class="col-md-3 m-4 p-3" id="new-ruche">
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
                        <input type="text" class="form-control @error('nom_ruche') is invalid @enderror "
                            name="nom_ruche" />
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
                            <option value="Buckfast">Buckfast</option>
                            <option value="Abeilles noires">Abeilles noires</option>
                            <option value="Abeilles hybrides">Abeilles hybrides</option>
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
                            <option value="Buckfast">Bois</option>
                            <option value="Abeilles noires">Champs cultivés</option>
                            <option value="Abeilles hybrides">Abords d'une rivière</option>
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
                        name="lignee_reine" />
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
                        name="nombre_cadres" />
                </div>
            </div>
            @error('nombre_cadres')
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



<div class="col-md-8 d-flex justify-content-start flex-wrap" id="square-ruches">
@foreach ($rucher->ruches as $ruche)

<!--Affichage des ruches appartenant au rucher -->
        
        {{-- <a href="{{route('ruche.show',$ruche)}}"> --}}
            <div class="col-md-2 m-4 p-2" id="ruche">
                <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('images/icone-ruche-charbon.png') }}" alt="ruche" id="icone-ruche">
                </div>
                <div class="col-md-5">
                <p>{{ $ruche->nom_ruche}}</p>
                <p>{{$ruche->espece}}</p>
                <p>{{$ruche->nombre_cadres}} cadres </p>
                </div>
                </div>

                <div class="row">
            <!--icon de modification d'une ruche-->
            <div class="col-md-3">
                <a href="{{ route('ruche.edit', $ruche) }}">
                     <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                </a>
            </div>

            <!--icon de suppression d'une ruche-->
            <div class="col-md-3">
                <form action="{{ route('ruche.destroy', $ruche) }}" method="post">
                    @csrf
                    @method('delete')

                    <button type="submit" class="btn-delete"><i class="fa-solid fa-circle-xmark"></i>
                    </button>
                </form>
            </div>

        </div>
            </div>
        {{-- </a> --}}
      
@endforeach
</div>

</div>
</div>
@endsection