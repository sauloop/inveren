@extends('layout')

@section('title',"{$title}")

@section('content')
@include('shared._admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 mb-4 p-0">
            <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('users.edit',$user)}}"><b>Editar usuario</b></a>
            </div>
            <br>
            @card
            @slot('header',"{$title}")
            @if($user->approved)
            @if($user->isTrial())
            <div class="col-12 d-flex justify-content-center form-group ml-4">
                <h5 style="color:green;">Prueba iniciada</h5>
            </div>
            @elseif($user->isSubscribed())
            <div class="col-12 d-flex justify-content-center form-group ml-4">
                <h5 style="color:green;">Suscripción iniciada</h5>
            </div>
            @endif
            @endif
            <div class="col-12 d-flex justify-content-center form-group ml-4">
                <b>Nombre:</b>&nbsp;{{$user->name}}
            </div>
            <div class="col-12 d-flex justify-content-center form-group ml-4">
                <b>Correo:</b>&nbsp;{{$user->email}}
            </div>
            <div class="col-12 d-flex justify-content-center form-group ml-4">
                <b>Empresa:</b>&nbsp;{{$user->profile->company_name}}
            </div>
            <div class="col-12 d-flex justify-content-center form-group ml-4">
                <b>Dirección:</b>&nbsp;{{$user->profile->address}}
            </div>
            <div class="col-12 d-flex justify-content-center form-group ml-4">
                <b>Teléfono:</b>&nbsp;{{$user->profile->phone}}
            </div>
            @endcard
            <br>
            <div class="col-12 d-flex justify-content-start p-0">
                <a class="a_nav" href="{{route('users.index')}}">Listado usuarios</a>
            </div>
            <br>
            @if(!$user->approved)
            @if($user->isTriable())
            <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('trial.init',$user)}}"><b>Iniciar prueba</b></a>
            </div>
            @elseif($user->isSubscriptable())
            <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('subscription.init',$user)}}"><b>Iniciar suscripción</b></a>
            </div>
            @endif
            @endif
            @if($user->approved)
            @if($user->isTrial())
            <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('trials.index')}}">Pruebas pendientes</a>
            </div>
            @elseif($user->isSubscribed())
            <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('subscriptions.index')}}">Suscripciones pendientes</a>
            </div>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection