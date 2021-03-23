@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex justify-content-start">
            <div>
                <b>Estás viendo:</b>&nbsp;<a class="a" href="{{route('about')}}">{{$title}}</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12  d-flex justify-content-center">
            <div>
                <p class="text_info">
                    En inverenlace seleccionamos información para un grupo de inversores en España. Publicamos enlaces
                    sobre análisis de bolsa y también filtramos anuncios de venta de inmuebles, coleccionismo,
                    vehículos...<br>
                    Aquí puedes publicar gratis enlaces a tus anuncios y aparecerán diferenciados del resto.
                </p>
            </div>
        </div>
    </div>

    @endsection