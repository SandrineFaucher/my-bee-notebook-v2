@extends('layouts.app')


@section('content')
<!--Formulaire d'ajout d'une récolte-->
<div class="col-md-3 mx-auto" id="recolte">
    <h3 class="text-center">Modifier la récolte</h3>
    <form action="{{ route('recoltes.update' , $recolte) }}" method="post">
      @csrf
      @method('put')
        <!--Je passe le user de la récolte en hidden-->
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    
        <!--Ajout du miel en Kg -->
        <div class="row">
        <div class="col-md-12">
          <label for="miel">Miel :</label>
          <input type="text" class="form-control @error('miel') is invalid @enderror "
              name="miel" value="{{$recolte->miel}}"/>
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
                name="pollen" value="{{$recolte->pollen}}"/>
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
                name="gelee_royale" value="{{$recolte->gelee_royale}}"/>
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
                  name="propolis" value="{{$recolte->propolis}}"/>
            </div>
            </div>
            @error('propolis')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
    
            <!--Valider la récolte-->
            <div class="col-md-12 text-center mt-4">
              <button type="submit" class="btn btn-secondary mx-auto mt-3 text-center ">
                  Modifier
              </button>
          </div>
      </form>
    </div>


@endsection