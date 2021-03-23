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
                {{-- @card
                @slot('header',"{$title}")
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
        @endcard --}}



        <div class="card">
            <h4 class="card-header">{{$title}}</h4>
            <br>
            <div class="card-body">
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
            </div>
            <br>
        </div>
    </div>
</div>
</div>
@endsection