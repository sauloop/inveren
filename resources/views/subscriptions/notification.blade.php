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
<div class="col-12 d-flex justify-content-start p-0">
    <div>
        <b>Estás viendo:</b>&nbsp;<a class="a" href="{{route('subscription.notification')}}">{{$title}}</a>
    </div>
</div>
<br>

@trial
<div class="col-12 p-0">
    <p id="info" class="text-left">Su cuenta está en período de prueba hasta<b>&nbsp;{{$subscription_end}}</b>.</p>
    <p id="info" class="text-left">Al terminar su período de prueba sus enlaces se mantendrán pero estarán
        despublicados. Su publicación se reanudará al contratar una suscripción.</p>
</div>
@endtrial

@subscribed
<div class="col-12 p-0">
    <p id="info" class="text-left">Su suscripción está activa hasta<b>&nbsp;{{$subscription_end}}</b>.</p>
    <p id="info" class="text-left">Al terminar su suscripción sus enlaces se mantendrán pero estarán
        despublicados. Su publicación se reanudará al contratar una nueva suscripción.</p>
</div>
@endsubscribed

@endsection