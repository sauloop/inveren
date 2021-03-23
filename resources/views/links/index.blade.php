@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
{{-- @include('shared._admin')
<br> --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex justify-content-start">
            <div>
                <b>Estás viendo:</b>&nbsp;<a class="a" href="{{route('links.index')}}">{{$title}}</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <a class="a_nav" href="{{route('links.create')}}"><b>Publicar enlace</b></a>
        </div>
    </div>
    <br>
    @include('links._adminfilters')
    <br>
    {{-- <div class="col-12 d-flex justify-content-end p-0">
    <div>
        <b>Ordenar por:</b>&nbsp;&nbsp;<a class="a" href="{{$sortable->url('date')}}">Fecha
    <i class="{{$sortable->classes('date')}}"></i></a>
    <a class="a ml-2" href="{{$sortable->url('header')}}">Título
        <i class="{{$sortable->classes('header')}}"></i></a>
    @if($filter&&!$exchange_filter)
    <a class="a ml-2" href="{{$sortable->url('cost')}}">Precio
        <i class="{{$sortable->classes('cost')}}"></i></a>
    @endif
</div>
</div>
<br> --}}
@if ($links->isNotEmpty())
<div class="row">
    <div class="col-12">
        <table style="width: 100%;table-layout: fixed;">
            <thead class="thead-dark">
                <tr>
                    <th>&nbsp;Borrar</th>
                    <th><a class="a_th" href="{{$sortable->url('date')}}">Fecha
                            <i class="{{$sortable->classes('date')}}"></i></a>
                    </th>
                    <th>Tipo</th>
                    <th><a class="a_th" href="{{$sortable->url('header')}}">Título
                            <i class="{{$sortable->classes('header')}}"></i></a></th>
                    <th> @if($filter&&!$exchange_filter)<a class="a_th" href="{{$sortable->url('cost')}}">Precio
                            <i class="{{$sortable->classes('cost')}}"></i></a>@else Precio @endif
                    </th>
                    <th>Editar&nbsp;</th>
                </tr>
                {{-- <tr>
                    <th>&nbsp;Borrar</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Título</th>
                    <th>Precio</th>
                    <th>Editar&nbsp;</th>
                </tr> --}}
            </thead>
            <tbody>
                @foreach ($links as $link)
                <tr>
                    <td>
                        <form action="{{route('links.destroy',$link)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button style="padding:0" class="btn btn-link a" type="submit">
                                <i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    <td id="detalles">&nbsp;{{$link->created_at->format('d/m/Y')}}</td>
                    <td id="detalles">{{$link->category->name}}</td>
                    <td class="word-break">
                        <a class="a" href="{{$link->url}}">{{$link->title}}</a>
                    </td>
                    <td>@if($link->price!=0)<b>{{number_format($link->price,0,",",".")}}&nbsp;€</b>@endif</td>
                    <td>
                        <a style="padding:0" href="{{route('links.edit', $link)}}" class="btn btn-link a" role="button">
                            <i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="row">
    <div class="col-12">
        {{$links->links()}}
    </div>
</div>
@else
<div class="row">
    <div class="col-12">
        <p>
            <h4 class="bg-dark" style="color:white">No hay enlaces.</h4>
        </p>
    </div>
</div>
@endif
@endsection