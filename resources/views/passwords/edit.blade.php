@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 mb-4">
            <div>
                @card
                @slot('header',"{$title}")
                @include('shared._errors')
                <form method="POST" action="{{route('passwords.update',['user'=>$user])}}">
                    @method('PUT')
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <label for="current_password"><b>Contraseña actual:</b></label>
                            <input type="password" class="form-control" name="current_password" id="current_password">
                        </div>
                        <div class="form-group">
                            <label for="password"><b>Nueva contraseña:</b></label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation"><b>Confirmación contraseña:</b></label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation">
                        </div>
                    </div>
                    <div class="col-12 form-group mt-4">
                        <button type="submit" class="btn btn-primary">Actualizar contraseña</button>
                    </div>
                </form>
                @endcard
            </div>
            <br>
            <div class="col-12 d-flex justify-content-start p-0">
                <div>
                    <a class="a_nav" href="{{route('accounts.edit',$user)}}">Editar cuenta</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection