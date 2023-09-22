@extends('layouts.app')


@section('content')
    <h1 class="text-center">Back-Office <h1>

            <div class="container">

                <div class="row ">

                    <!--Affichage et suppression des comptes utilisateurs-->
                    <h3 class="mt-4 mb-4 text-center">Suppression des comptes utilisateurs, ruchers ou ruches</h3>
                    @foreach ($user as $user)

                        <div class="col-md-8 my-auto">
                            <p class="fs-2 my-auto border-bottom border-secondary">{{ $user->nom }} {{ $user->prenom }}</p>
                        </div>

                        <div class="col-md-4">
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-secondary col-md-8 mb-2 mt-3">
                                    Suppression du compte
                                </button>

                            </form>
                        </div>

                        <!-- Affichage et suppression des ruchers-->
                        @foreach($user->ruchers as $rucher)
                        <div class="col-md-8 my-auto">
                            <p class="fs-4 my-auto ms-4 border-bottom border-warning">{{ $rucher->nom_rucher }} </p>
                        </div>

                        <div class="col-md-4">
                            <form action="{{ route('ruchers.destroy', $rucher) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-warning col-md-8 mb-2 mt-3">
                                    Suppression du rucher
                                </button>

                            </form>
                        </div>

                        <!-- Affichage et suppression des ruches-->
                        @foreach($rucher->ruches as $ruche)
                        <div class="col-md-8 my-auto">
                            <p class="fs-6 my-auto ms-5">{{ $ruche->numero }} </p>
                        </div>

                        <div class="col-md-4">
                            <form action="{{ route('ruche.destroy', $ruche) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger col-md-8 mb-2 mt-3">
                                    Suppression de la ruche
                                </button>

                            </form>
                        </div>
                        @endforeach



                        @endforeach
                    @endforeach

                    





                </div>
            @endsection
