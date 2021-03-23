@extends('layout')

@section('title',"Administrar")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <br>
            @card
            @slot('header','Administrar')
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <br>
            <div class="col-12 d-flex justify-content-center">
                <a class="a_nav" href="{{route('links.index')}}"><b>Inicio</b></a>
            </div>
            <br><br>
            @if(!$user->filled)
            <a href="{{route('profile.create')}}">Ingresar datos cuenta</a>
            <br><br>
            @else
            <a href="{{route('profile.show', $user->profile)}}">Datos cuenta</a>
            <br><br>
            @endif

            @if($user->trial||$user->approved)
            <a href="{{route('ads.create')}}">Nuevo enlace</a><br><br>
            @else
            <a href="{{route('subscription.edit',$user)}}">Nuevo enlace</a><br><br>
            @endif

            <a href="{{route('ads.index')}}">Mis enlaces</a><br><br>

            @endcard
        </div>
    </div>
    @endsection