@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
{{-- @include('shared._admin')
<br> --}}
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 mb-4">
            <div>
                @card
                @slot('header','Nueva categoría')
                @include('shared._errors')
                <form method="POST" action="{{route('categories.store')}}">
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name"><b>Nombre:</b></label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{old('name',$category->name)}}">
                        </div>
                    </div>
                    <div class="col-12 form-group mt-4">
                        <button type="submit" class="btn btn-primary">Crear categoría</button>
                    </div>
                </form>
                @endcard
            </div>
            <br>
            <div class="col-12 d-flex justify-content-start p-0">
                <div>
                    <a class="a_nav" href="{{route('categories.index')}}">Listado categorías</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection