@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
@admin
<div class="col-12 p-0">
    <a style="color:white" href="{{route('admin_dashboard')}}" class="btn btn-dark" role="button">Administrar</a>
</div>
<br>
@endadmin
<div class="col-12 d-flex justify-content-start p-0">
    <div>
        <b>Estás viendo:</b>&nbsp;<a class="a" href="{{route('subscriptions.init')}}">{{$title}}</a>
    </div>
</div>
<br>
@if($users->isNotEmpty())
<div class="row">
    <div class="col-12">
            <h4 class="bg-dark" style="color:white">Suscripciones iniciadas:</h4>
    </div>
</div>
@endif

@forelse($users as $user)
<p id="info">{{ $user->name }}</p>
@empty
<div class="row">
    <div class="col-12">
        <p>
            <h4 class="bg-dark" style="color:white">No hay suscripciones pendientes.</h4>
        </p>
    </div>
</div>
@endforelse
@endsection