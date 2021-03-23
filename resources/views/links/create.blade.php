@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
{{-- @include('shared._admin') --}}
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 mb-4">
            <div>
                {{-- @card
                @slot('header',"{$title}")
                @include('shared._errors')
                <form method="POST" action="{{route('links.store')}}">
                @include('links._fields')
                <div class="col-12 form-group mt-4">
                    <button type="submit" class="btn btn-primary">Crear enlace</button>
                </div>
                </form>
                @endcard --}}

                <div class="card">
                    <h4 class="card-header">{{$title}}</h4>
                    @include('shared._errors')
                    <div class="card-body">
                        <form method="POST" action="{{route('links.store')}}">
                            @include('links._fields')
                            <div class="col-12 form-group mt-4">
                                <button type="submit" class="btn btn-primary">Crear enlace</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <br>
            <div class="col-12 d-flex justify-content-start p-0">
                <a class="a_nav" href="{{ url()->previous() }}">Volver</a>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection