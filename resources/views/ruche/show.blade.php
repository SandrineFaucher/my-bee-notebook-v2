@extends('layouts.app')


@section('content')
    <!--bouton retour-->
    <button class="btn btn-secondary mx-auto mt-3 text-center ms-5 mb-5"onclick="rtn()">Retour</button>

    <h1 class="text-center"> Visite de la Ruche : {{ $ruche->nom_ruche }} - N° {{ $ruche->numero }}</h1>

    <div class="container-fluid mt-5 p-5 text center">
        <div class="row ">


            <!--Formulaire de visite-->
            <div class="col-lg-4">
                <form action="{{ route('visites.store') }}" method="post" id="visite">
                    <h3 class="text-center">Création d'une visite</h3>
                    @csrf
                    <!--passe ruche_id dans le formulaire-->
                    <input type="hidden" name="ruche_id" value="{{ $ruche->id }}">

                    <!--Champ date de la visite-->
                    <div class="row">
                        <div class="col-md-12 ">
                            <label for="date_visite" class="fs-5">Date de visite :</label>
                            <input type="date" class="form-control form-control-lg fs-5 @error('date_visite') is invalid @enderror "
                                name="date_visite" />
                        </div>
                        @error('date_visite')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!--Nombre cadres d'abeilles-->
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="nombre_cadres_abeilles" class="fs-5">Nombre de cadres d'abeilles :</label>
                            <input type="number" min="0"
                                class="form-control form-control-lg fs-5 @error('nombre_cadres_abeilles') is invalid @enderror "
                                name="nombre_cadres_abeilles" />
                        </div>
                        @error('nombre_cadres_abeilles')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!--Nombre cadres de couvain-->
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="nombre_cadres_couvain" class="fs-5">Nombre de cadres de couvain :</label>
                            <input type="number" min="0" class="form-control form-control-lg fs-5 @error('nombre_cadres_couvain') is invalid @enderror "
                                name="nombre_cadres_couvain" />
                        </div>
                        @error('nombre_cadres_couvain')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!--Nombre cadres de miel-->
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="nombre_cadres_miel" class="fs-5">Nombre de cadres de miel :</label>
                            <input type="number" min="0" class="form-control form-control-lg fs-5 @error('nombre_cadres_miel') is invalid @enderror "
                                name="nombre_cadres_miel" />
                        </div>
                        @error('nombre_cadres_miel')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!--Nombre de hausses-->
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="nombre_hausses" class="fs-5">Nombre de hausses :</label>
                            <input type="number" min="0" class="form-control form-control-lg fs-5 @error('nombre_hausses') is invalid @enderror "
                                name="nombre_hausses" />
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
                                aria-label="Default select example">
                                <option value="Non"> Non </option>
                                <option value="Oui"> Oui </option>
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
                            <input type="number" min="0" class="form-control form-control-lg fs-5 @error('cellules_royales') is invalid @enderror "
                                name="cellules_royales" />
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
                                aria-label="Default select example">
                                <option value=""></option>
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
                            <label for="essaimage" class="fs-5">Essaimage :</label>
                            <select class="form-select form-select-lg fs-5 @error('reine_vue') is invalid @enderror" name="essaimage"
                                aria-label="Default select example">
                                <option value="A surveiller">A surveiller</option>
                                <option value="A essaimé"> A essaimé </option>
                                <option value="Risque élevé d'essaimage"> Risque élevé d'essaimage </option>
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
                                aria-label="Default select example">
                                <option value=""></option>
                                <option value="sirop de glucose">Sirop de glucose </option>
                                <option value="candy"> Pain de candy </option>
                                <option value="pain protéiné">Pain protéiné</option>
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
                                aria-label="Default select example">
                                <option value="Bande anti-varoa">Bande anti-varoa </option>
                                <option value="Acide oxalyque"> Acide oxalique </option>
                            </select>
                            @error('traitement')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <!--Détail du traitement-->
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="commentaire" class="fs-5">Détails sanitaires (*registre d'élevage) :</label>
                            <textarea class="form-control form-control-lg fs-5 @error('detail_traitement') is invalid @enderror " name="detail_traitement"
                                rows="5"></textarea>
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
                                    value="1">
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
                                    name="chasse_abeilles" value="1">
                            </div>
                        </div>
                        @error('chasse_abeilles')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!--Grille propolis-->
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label class="me-3 fs-5" for="grille_propolis">Grille à propolis : </label>
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input @error('grille_propolis') is invalid @enderror"
                                    type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                                    name="grille_propolis" value="1">
                            </div>
                        </div>
                        @error('grille_propolis')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!--Force-->
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="force" class="fs-5">Force de la ruche de 1 à 10 :</label>
                            <input type="range" class="form-range  fs-5 @error('force') is invalid @enderror "
                                name="force" min="1" max="10" />
                        </div>
                        @error('force')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!--Commentaire-->
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="commentaire" class="fs-5">Commentaire :</label>
                            <textarea class="form-control form-control-lg fs-5 @error('commentaire') is invalid @enderror " name="commentaire" rows="5"></textarea>
                        </div>
                        @error('commentaire')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center fs-5">
                            valider
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-8  ps-4 mt-3">
                <!--Affichage d'une visite-->
                <div class="col-lg-8 mx-auto">
                    @foreach($ruche->visites as $visite)
                    <h3 class="text-center mt-4">
                        Visite du : {{ $visite->date_visite ? date('d/m/y', strtotime($visite->date_visite)) : 'Aucune visite récente' }}

                        <!--Affichage des icones de modification et de suppression-->
                        <div class="row text-center">
                            <div class="col-md-12 d-flex justify-content-around">
                                <div class="col-md-6  text-center  ">

                                    <!--icone de modification d'une visite-->
                                    <a href="{{ route('visites.edit', $visite) }}">
                                        <i class="fa-sharp fa-solid fa-pen-to-square fs-5 text-secondary-emphasis"
                                            title="Modifier"></i>
                                    </a>
                                </div>

                                <div class="col-md-6 text-center  ">
                                    <!--icon de suppression du rucher-->
                                    <form action="{{ route('visites.destroy', $visite) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn-delete"><i
                                                class="fa-solid fa-circle-xmark fs-5 text-secondary-emphasis"
                                                title="Supprimer"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </h3>


                    <ul class="list-group fs-5">
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Cadres d'abeilles : </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->nombre_cadres_abeilles }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Cadres de couvain : </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->nombre_cadres_couvain }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Cadres de miel : </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->nombre_cadres_miel }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6 ">
                                    <p>Hausses : </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->nombre_hausses }}
                                </div>
                            </div>
                        </li>
                        @if ($visite->reine_vue == 'Oui')
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Reine vue : </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <i class="fa-solid fa-eye yes" ></i>
                                </div>
                            </div>
                        </li>
                        @elseif($visite->reine_vue == 'Non')
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3 ">
                                <div class="col-md-6 ">
                                    <p>Reine vue : </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <i class="fa-solid fa-eye-slash no"></i>
                                </div>
                            </div>
                        </li>
                        @endif
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Cellules royales :  </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->cellules_royales }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Ruche orpheline :  </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->ruche_orpheline }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Essaimage :  </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->essaimage }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Nourrissement :  </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->nourrissement }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Traitements :  </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->traitement }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item word-break: break-word">Détails sanitaires :
                            {{ $visite->detail_traitement }}</li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Grille à reine :  </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->grille_reine }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Chasse abeilles :   </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->chasse_abeilles }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Grilles à propolis :   </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->grille_propolis }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="col-md-12 d-flex justify-content-around pt-3">
                                <div class="col-md-6">
                                    <p>Force de la ruche :   </p>
                                </div>
                                <div class="col-md-6 text-center">
                                    {{ $visite->force }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item word-break: break-word">Commentaire :
                            {{ $visite->commentaire }}</li>
                    </ul>
                    @endforeach
                </div>
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
