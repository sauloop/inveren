@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
{{-- @include('shared._admin') --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex justify-content-start">
            <div>
                <b>Estás viendo:</b>&nbsp;<a class="a" href="{{route('users.index')}}">{{$title}}</a>
            </div>
        </div>
    </div>
    <br>
    @include('users._filters')
    <br>
    @if ($users->isNotEmpty())
    <div class="row">
        <div class="col-12">
            {{-- <table style="width: 100%"> --}}
            <table style="width: 100%;table-layout: fixed;">
                <thead class="thead-dark">
                    <tr>
                        <th>&nbsp;Borrar</th>
                        <th><a class="a_th" href="{{$sortable->url('header')}}">Nombre
                                <i class="{{$sortable->classes('header')}}"></i></a></th>
                        <th>Rol</th>
                        <th>Editar&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            <form action="{{route('users.destroy',$user)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link a" type="submit">
                                    <i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td>
                            @if($user->filled)
                            <a href="{{route('users.show', $user)}}" class="btn btn-link a"
                                role="button">{{$user->name}}
                            </a>
                            @else
                            {{$user->name}}
                            @endif
                        </td>
                        <td>{{$user->role()}}</td>
                        <td>
                            <a href="{{route('users.edit', $user)}}" class="btn btn-link a" role="button"><i
                                    class="fas fa-edit"></i>
                            </a>
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
            {{$users->links()}}
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-12">
            <p>
                <h4 class="bg-dark" style="color:white">No hay usuarios registrados.</h4>
            </p>
        </div>
    </div>
    @endif
    @endsection