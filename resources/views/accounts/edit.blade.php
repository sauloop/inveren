@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
<div class="container-fluid">
    @if(session()->has('msg'))
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8">
            <div style="text-align:center;" class="alert alert-{{$style}}">
                <h5><b>{{ session()->get('msg') }}</b></h5>
            </div>
        </div>
    </div>
    @endif
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 mb-4">
            <br>
            <div>
                @card
                @slot('header',"{$title}")
                @include('shared._errors')
                <form method="POST" action="{{route('accounts.update',['user'=>$user])}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group ml-2 mr-2">
                        <label for="name"><b>Nombre:</b></label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{old('name',$user->name)}}">
                    </div>
                    <div class="form-group ml-2 mr-2">
                        <label for="email"><b>Correo:</b></label>
                        <input type="text" class="form-control" name="email" id="email"
                            value="{{old('email',$user->email)}}">
                    </div>
                    <br>
                    <div class="form-group mr-2">
                        <div class="col-12 d-flex justify-content-end p-0">
                            <div>
                                <a class="a_nav" href="{{route('passwords.edit',$user)}}"><b>Cambiar contraseña</b></a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-12 form-group ml-2 p-0">
                        <button type="submit" class="btn btn-primary">Actualizar cuenta</button>
                    </div>
                </form>
                @endcard
            </div>
            <br>
            <div class="col-12 d-flex justify-content-start p-0">
                <div>
                    <a class="a_nav" href="{{route('accounts.show',$user)}}">Datos cuenta</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection