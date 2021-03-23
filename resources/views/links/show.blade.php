@extends('layout')

@section('title',"Enlace {$link->id}")

@section('content')
<h1>Enlace #{{$link->id}}</h1>

<p>Título: {{$link->title}}</p>
<p><a href="{{route('links.list')}}">Regresar al listado de enlaces</a></p>
@endsection