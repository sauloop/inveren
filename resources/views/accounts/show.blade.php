@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 mb-4">
            <br>
            <div class="col-12 d-flex justify-content-end p-0">
                <a class="a_nav" href="{{route('accounts.edit',$user)}}"><b>Editar</b></a>
            </div>
            <br>
            <div>
                @card
                @slot('header',"{$title}")
                <div class="form-group ml-2">
                    <b>Nombre:</b>&nbsp;{{$user->name}}
                </div>
                <div class="form-group ml-2">
                    <b>Correo:</b>&nbsp;{{$user->email}}
                </div>
                <br>
                <div class="form-group mr-2">
                    <div class="col-12 d-flex justify-content-end p-0">
                        <form action="{{route('accounts.destroy',$user)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button style="padding:0;color:red;" class="btn btn-link" type="submit">
                                <b>Borrar cuenta</b>
                            </button>
                        </form>
                    </div>
                </div>
                @endcard
            </div>
            <br>
            <div class="col-12 d-flex justify-content-between p-0">
                <div>
                    <a class="a_nav" href="{{route('company_dashboard')}}">Gestionar cuenta</a>
                </div>
            </div>
        </div>
    </div>
    @endsection