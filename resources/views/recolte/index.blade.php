@extends('layouts.app')


@section('content')
<h1 class="text-center">Mes récoltes</h1>

<div class="container fluid mt-5">
<div class="row">

<!--Formulaire d'ajout d'une récolte-->
<div class="col-md-3" id="recolte">
<h3 class="text-center">Ajouter une récolte</h3>
<form action="{{ route('recoltes.store') }}" method="post">
  @csrf
    <!--Je passe le user de la récolte en hidden-->
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

    <!--Ajout du miel en Kg -->
    <div class="row">
    <div class="col-md-12">
      <label for="miel">Miel :</label>
      <input type="text" class="form-control @error('miel') is invalid @enderror "
          name="miel" />
    </div>
    </div>
    @error('miel')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror

    <!--Ajout du pollen en Kg -->
    <div class="row">
      <div class="col-md-12">
        <label for="pollen">Pollen :</label>
        <input type="text" class="form-control @error('pollen') is invalid @enderror "
            name="pollen" />
      </div>
      </div>
      @error('pollen')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror

      <!--Ajout de gelée royale en Kg -->
      <div class="row">
      <div class="col-md-12">
        <label for="pollen">Gelée Royale :</label>
        <input type="text" class="form-control @error('gelee_royale') is invalid @enderror "
            name="gelee_royale" />
      </div>
      </div>
      @error('gelee_royale')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror

      <!--Ajout de propolis en Kg -->
      <div class="row">
        <div class="col-md-12">
          <label for="pollen">Propolis :</label>
          <input type="text" class="form-control @error('propolis') is invalid @enderror "
              name="propolis" />
        </div>
        </div>
        @error('propolis')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

      <!--Affichage des ruches à cocher-->
      <div class="row">
        <div class="col-md-12">
          @foreach ($ruches as $ruche)
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                  name="rucheId{{ $ruche->id }}">
              <label class="form-check-label" for="flexCheckDefault">
                  Ruche n° :{{ $ruche->numero }}
              </label>
          </div>
          @endforeach
        </div>
      </div>


        <!--Valider la récolte-->
        <div class="col-md-12 text-center mt-4">
          <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center ">
              Valider
          </button>
      </div>
  </form>
</div>
    

<!--Affichage des récoltes-->
<div class="col-md-7 m-5">
@foreach($user->recoltes as $recolte)




<table class="table">
    <thead>
      <tr>
        <th scope="col">Date </th>
        <th scope="col">Miel</th>
        <th scope="col">Pollen</th>
        <th scope="col">Gelée Royale</th>
        <th scope="col">Propolis</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{date('d.m.y', strtotime($recolte->created_at))}} </td>
        <td>{{$recolte->miel}} kg </td>
        <td>{{$recolte->pollen}} kg </td>
        <td>{{$recolte->gelee_royale}} kg </td>
        <td>{{$recolte->propolis}} kg </td>
      </tr>
    </tbody>
  </table>

  <div class="icones">
<!--Icones de modification et de suppression des récoltes-->
<div class="row mt-4 mx-auto ">
  <div class="d-flex flex-nowrap">
      <div class="col-md-5 text-center pe-2">
          <!--icon de modification d'une visite-->
          <a href="{{ route('recoltes.edit', $recolte) }}">
              <i class="fa-sharp fa-solid fa-pen-to-square fs-5 text-secondary-emphasis"></i>
          </a>
      </div>

      <div class="col-md-5 text-center ps-3 ">
          <!--icon de suppression du rucher-->
          <form action="{{ route('recoltes.destroy', $recolte) }}" method="post">
              @csrf
              @method('delete')

              <button type="submit" class="btn-delete"><i
                      class="fa-solid fa-circle-xmark fs-5 text-secondary-emphasis"></i>
              </button>
          </form>
      </div>
  </div>
</div>


  </div>
@endforeach
</div>

</div>

<div class="row">
<div class="col-md-6 mx-auto">
  <canvas id="barCanvas" aria-label="chart" role="img"></canvas>
</div>
</div>

@endsection