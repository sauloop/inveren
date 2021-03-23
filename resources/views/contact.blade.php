@extends('layout')

@section('title',"{$title}")

@section('content')
<br>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        @if(isset($confirmation))
        <div class="col-12">
            <h4 style="color:white" class="bg-dark">{{$confirmation}}</h4>
        </div>
        @else
        <div class="col-12 col-md-8 mb-3">
            <div>
                @card
                @slot('header',"{$title}")
                @include('shared._errors')
                <form method="POST" action="{{route('messages.store')}}">
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name"><b>Nombre:</b></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email"><b>Correo:</b></label>
                            <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="subject"><b>Asunto:</b></label>
                            <input type="text" class="form-control" name="subject" id="subject"
                                value="{{old('subject')}}">
                        </div>
                        <div class="form-group">
                            <label for="content"><b>Mensaje:</b></label>
                            <textarea class="form-control" name="content" id="content"
                                value="{{old('content')}}"></textarea>
                        </div>
                    </div>
                    <div class="col-12 form-group mt-4">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
                @endcard
            </div>
        </div>
        @endif
    </div>
</div>
@endsection