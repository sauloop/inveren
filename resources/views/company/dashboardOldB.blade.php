@extends('layout')

@section('title',"{$title}")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <br><br>
            @subscription_ending
            <div class="col-12 d-flex justify-content-left p-0">
                <p id="info" style="color:red;"><b>Su período de suscripción está terminando
                        ({{$subscription_end}}).</b></p>
            </div>
            @endsubscription_ending
            @if($user->approved)
            <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('ads.create')}}"><b>Publicar enlace</b></a>
            </div>
            <br>
            @elseif($user->trial)
            <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('subscription.info',$user)}}"><b>Publicar enlace</b></a>
            </div>
            <br>
            @else
            <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('subscription.edit',$user)}}"><b>Publicar enlace</b></a>
            </div>
            <br>
            @endif
            @card
            @slot('header','Gestionar cuenta')
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <br>
            <div class="col-12 d-flex justify-content-center">
                <a class="a_nav" href="{{route('index')}}"><b>Inicio</b></a>
            </div>
            <br><br>
            @if(!$user->filled)
            <div class="col-12 d-flex justify-content-center">
                <a class="a_nav" href="{{route('profiles.create')}}"><b>Ingresar datos cuenta</b></a>
            </div>
            <br><br>
            @else
            <div class="col-12 d-flex justify-content-center">
                <a class="a_nav" href="{{route('profiles.show', $user->profile)}}"><b>Datos cuenta</b></a>
            </div>
            <br><br>
            @endif
            <div class="col-12 d-flex justify-content-center">
                <a class="a_nav" href="{{route('ads.index')}}"><b>Mis enlaces</b></a>
            </div>
            <br><br>

            @if($user->approved)
            <div class="col-12 d-flex justify-content-center">
                <a class="a_nav" href="{{route('subscription.notification')}}"><b>Suscripción</b></a>
            </div>
            <br><br>
            @endif
            @endcard
        </div>
    </div>
    @endsection