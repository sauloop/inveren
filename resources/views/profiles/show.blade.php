@extends('layout')

@section('title','Datos cuenta')

@section('content')
{{-- <br>
@company
<div class="col-12 p-0">
    <a style="color:white" href="{{route('company_dashboard')}}" class="btn btn-dark" role="button">Gestionar
cuenta</a>
</div>
<br>
@endcompany --}}
{{-- <div class="container"> --}}
<div class="row justify-content-center mb-4">
    <div class="col-12 col-md-8">
        <br>
        @card
        @slot('header','Datos cuenta')
        <div class="col-12">
            <p class="text-left"><b>Empresa:</b>&nbsp;{{$profile->company_name}}</p>
            <p class="text-left"><b>Dirección:</b>&nbsp;{{$profile->address}}</p>
            <p class="text-left"><b>Teléfono:</b>&nbsp;{{$profile->phone}}</p>
            <p class="text-left"><b>Provincia:</b>&nbsp;{{$profile->city->name}}</p>
        </div>
        <div class="col-12 mt-4">
            <a style="color:white" href="{{route('profiles.edit',$profile)}}" class="btn btn-primary"
                role="button">Editar datos</a>
        </div>
        @endcard
    </div>
</div>
{{-- </div> --}}
@endsection