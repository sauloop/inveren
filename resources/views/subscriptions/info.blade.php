@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
@company
<div class="col-12 p-0">
    <a style="color:white" href="{{route('company_dashboard')}}" class="btn btn-dark" role="button">Gestionar cuenta</a>
</div>
<br>
@endcompany

@if($user->filled)
<div class="col-12 p-0">
    <p id="info" class="text-left">Su período de prueba está pendiente de aprobación.</p>
</div>
@else
<div class="col-12 p-0">
    <p id="info" class="text-left">Para activar el período de prueba y poder publicar enlaces, es necesario que ingrese
        los <a class="a_nav" href="{{route('profiles.create')}}">datos de su cuenta.</a></p>
</div>
@endif
@endsection