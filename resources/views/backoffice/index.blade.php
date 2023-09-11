@extends('layouts.app')


@section('content')
    <h1 class="text-center">Back-Office <h1>

            <div class="container">
                @foreach ($user as $user)
                <h3>{{$user->nom}} {{$user->prenom}}</h3>
                @endforeach
                </div>
@endsection
