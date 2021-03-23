@extends('layout')

@section('title','Editar enlace')

@section('content')
<br>
{{-- @include('shared._admin') --}}
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 mb-4">
            <div>
                @card
                @slot('header','Editar enlace')
                @include('shared._errors')
                <form method="POST" action="{{route('ads.update',['link'=>$link])}}">
                    @method('PUT')
                    @include('ads._fields')
                    <div class="col-12 form-group mt-4">
                        <button type="submit" class="btn btn-primary">Actualizar enlace</button>
                    </div>
                </form>
                @endcard
            </div>
            <br>
            <div class="col-12 d-flex justify-content-start p-0">
                <a class="a_nav" href="{{route('ads.index')}}">Mis enlaces</a>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection