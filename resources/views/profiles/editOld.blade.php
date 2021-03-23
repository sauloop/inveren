@extends('layout')

@section('title','Editar perfil')

@section('content')

@include('shared._errors')
<form method="POST" action="{{route('profiles.update',['profile'=>$profile])}}">
    @method('PUT')
    @include('profiles._fields')
    <div>
        <button type="submit">Actualizar datos</button><br><br>
        <a href="{{route('company_dashboard')}}">Gestionar cuenta</a>
    </div>
</form>
@endsection