@extends('layout')

@section('title',"{$title}")

@section('content')
{{-- @include('shared._admin') --}}
<br>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 mb-4">
            {{-- <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('user.reset',$user)}}"><b>Reiniciar usuario</b></a>
        </div>
        <br> --}}
        <div>
            @card
            @slot('header','Editar usuario')
            @include('shared._errors')
            <form method="POST" action="{{route('users.update',['user'=>$user])}}">
                @method('PUT')
                @include('users._fields')
                <div class="col-12 form-group mt-4">
                    <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                </div>
            </form>
            @endcard
        </div>
        <br>
        <div class="col-12 d-flex justify-content-start p-0">
            <div>
                <a class="a_nav" href="{{route('users.index')}}">Listado usuarios</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection