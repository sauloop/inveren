@extends('layout')

@section('title',"{$title}")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <br><br>
            <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('ads.create')}}"><b>Publicar enlace</b></a>
            </div>
            <br>
            @card
            @slot('header',"{$title}")
            <br>
            <div class="col-12 d-flex justify-content-center">
                <a class="a_nav" href="{{route('index')}}"><b>Inicio</b></a>
            </div>
            <br><br>
            <div class="col-12 d-flex justify-content-center">
                <a class="a_nav" href="{{route('ads.index')}}"><b>Mis enlaces</b></a>
            </div>
            <br><br>
            <div class="col-12 d-flex justify-content-center">
                <a class="a_nav" href="{{route('accounts.show',$user)}}"><b>Datos cuenta</b></a>
            </div>
            <br><br>
            @endcard
        </div>
    </div>
    @endsection