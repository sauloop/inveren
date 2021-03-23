@extends('layout')

@section('title',"{$title}")

@section('content')
<br><br>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="col-12 d-flex justify-content-end p-0">
                <div>
                    <a class="a_nav" href="{{route('links.create')}}"><b>Publicar enlace</b></a>
                </div>
            </div>
            <br>
            <div>
                @card
                @slot('header',"{$title}")
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <br>
                <div class="col-12 d-flex justify-content-center">
                    <div>
                        <a class="a_nav" href="{{route('index')}}"><b>Inicio</b></a>
                    </div>
                </div>
                <br><br>
                @superadmin
                <div class="col-12 d-flex justify-content-center">
                    <div>
                        <a class="a_nav" href="{{route('users.index')}}"><b>Listado usuarios</b></a>
                    </div>
                </div><br><br>
                <div class="col-12 d-flex justify-content-center">
                    <div>
                        <a class="a_nav" href="{{route('trials.index')}}"><b>Pruebas</b>
                            @if($trials_number>0)
                            <b>({{$trials_number}})</b> @endif
                        </a>
                    </div>
                </div>
                <br><br>
                <div class="col-12 d-flex justify-content-center">
                    <div>
                        <a class="a_nav" href="{{route('subscriptions.index')}}"><b>Suscripciones</b>
                            @if($subscriptions_number>0)
                            <b>({{$subscriptions_number}})</b> @endif
                        </a>
                    </div>
                </div>
                <br><br>
                <div class="col-12 d-flex justify-content-center">
                    <div>
                        <a class="a_nav" href="{{route('unsubscribe.index')}}"><b>Bajas pendientes
                                @if ($subscriptions_end_number>0)
                                ({{$subscriptions_end_number}})
                                @endif</b></a>
                    </div>
                </div><br><br>
                @endsuperadmin
                <div class="col-12 d-flex justify-content-center">
                    <a class="a_nav" href="{{route('categories.index')}}"><b>Listado categorías</b></a>
                </div>
                <br><br>
                <div class="col-12 d-flex justify-content-center">
                    <div>
                        <a class="a_nav" href="{{route('links.index')}}"><b>Listado enlaces</b></a>
                    </div>
                </div>
                <br>
                @endcard
            </div>
        </div>
    </div>
    @endsection