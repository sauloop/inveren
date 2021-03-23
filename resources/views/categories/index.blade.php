@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
{{-- @include('shared._admin') --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex justify-content-start">
            <div>
                <b>Estás viendo:</b>&nbsp;<a class="a" href="{{route('categories.index')}}">{{$title}}</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <div>
                <a class="a_nav" href="{{route('categories.create')}}"><b>Nueva categoría</b></a>
            </div>
        </div>
    </div>
    <br>
    @if ($categories->isNotEmpty())
    <div class="row">
        <div class="col-12">
            <table style="width: 100%">
                <thead class="thead-dark">
                    <tr>
                        <th>&nbsp;Id</th>
                        <th>Nombre</th>
                        <th>Acciones&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <form action="{{route('categories.destroy',$category)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button style="padding:0" class="btn btn-link a" type="submit">
                                    <i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <br>
<div class="row">
    <div class="col-12">
        {{$categories->links()}}
</div>
</div> --}}
@else
<div class="row">
    <div class="col-12">
        <p>
            <h4 class="bg-dark" style="color:white">No hay categorías.</h4>
        </p>
    </div>
</div>
@endif
@endsection