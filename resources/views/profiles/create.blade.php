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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 mb-4 p-0">
            <br>
            @card
            @slot('header',"{$title}")
            @include('shared._errors')
            <form method="POST" action="{{route('profiles.store')}}">
                @include('profiles._fields')
                <div class="col-12 form-group mt-4 p-0">
                    <button type="submit" class="btn btn-primary">Ingresar datos</button>
                </div>
            </form>
            @endcard
        </div>
    </div>
</div>

@endsection