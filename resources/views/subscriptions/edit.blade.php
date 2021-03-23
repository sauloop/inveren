@extends('layout')

@section('title','Solicitar suscripción')

@section('content')
<br>
@company
<div class="col-12 p-0">
    <a style="color:white" href="{{route('company_dashboard')}}" class="btn btn-dark" role="button">Gestionar cuenta</a>
</div>
<br>
@endcompany

@if($user->approved)
<div class="col-12 p-0">
    <p id="info" class="text-left">Su cuenta está aprobada. Ya puede publicar enlaces.</p>
</div>
@else
@if(!$user->subscription)
<div class="col-12 p-0">
    <p id="info" class="text-left">Para publicar enlaces hay que estar suscrito.
        El coste de una suscripción anual sin límite de enlaces publicados es de 20€.</p>
    <p id="info" class="text-left">Solicítelo y nos pondremos en contacto con usted para acordar el método de pago:</p>
</div>
<div class="col-12 p-0">
    <form method="POST" action="{{route('subscription.update',['user'=>$user])}}">
        @method('PUT')
        @csrf
        <input name="subscription" type="hidden" value="1">
        <div>
            <button class="btn btn-primary" type="submit">Solicitar suscripción</button><br><br>
        </div>
    </form>
</div>
@else
<div class="col-12 p-0">
    <p id="info" class="text-left">Solicitud de suscripción recibida. Su cuenta está pendiente de aprobación.</p>
</div>
@endif
@endif
@endsection