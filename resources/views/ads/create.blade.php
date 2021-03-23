@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
{{-- @company
<div class="col-12 p-0">
    <a style="color:white" href="{{route('company_dashboard')}}" class="btn btn-dark" role="button">Gestionar
cuenta</a>
</div>
<br>
@endcompany --}}
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 mb-4">
            <div>
                @card
                @slot('header',"{$title}")
                @include('shared._errors')
                <form method="POST" action="{{route('ads.store')}}">
                    @include('ads._fields')
                    <div class="col-12 form-group mt-4">
                        <button type="submit" class="btn btn-primary">Crear enlace</button>
                    </div>
                </form>
                @endcard
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