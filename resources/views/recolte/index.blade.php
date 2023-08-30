@extends('layouts.app')


@section('content')
<h1 class="text-center">Mes récoltes</h1>

<div class="container mt-5">
<div class="row">
    
@foreach($user->recoltes as $recolte)
<h3 class="text-center ">Récolte du : {{date('d.m.y', strtotime($recolte->created_at))}}</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Miel</th>
        <th scope="col">Pollen</th>
        <th scope="col">Gelée Royale</th>
        <th scope="col">Propolis</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$recolte->miel}} kg </td>
        <td>{{$recolte->pollen}} kg </td>
        <td>{{$recolte->gelee_royale}} kg </td>
        <td>{{$recolte->propolis}} kg </td>
      </tr>
    </tbody>
  </table>


@endforeach
</div>
</div>

@endsection