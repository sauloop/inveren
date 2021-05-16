@extends('layout')

@section('title',"{$title}")

@section('description',"{$description}")

@section('content')
<br>
<div class="container-fluid">
    @if(session()->has('index_msg'))
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <div style="text-align:center;" class="alert alert-success">
                <h5><b>{{ session()->get('index_msg') }}</b></h5>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12 d-flex justify-content-start">
            <div>
                <b>Estás viendo:</b>&nbsp;<a class="a" href="{{route('index')}}">{{$title}}</a>
            </div>
        </div>
    </div>
    <br>
    @include('_filters')
    <br>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <div>
                <b>Ordenar por:</b>&nbsp;&nbsp;<a class="a" href="{{$sortable->url('date')}}">Fecha<i
                        class="{{$sortable->classes('date')}}"></i></a>&nbsp;&nbsp;
                <a class="a" href="{{$sortable->url('header')}}">Título<i
                        class="{{$sortable->classes('header')}}"></i></a>&nbsp;&nbsp;
                @if($filter&&!$exchange_filter)
                <a class="a" href="{{$sortable->url('cost')}}">Precio<i class="{{$sortable->classes('cost')}}"></i></a>
                @endif
            </div>
        </div>
    </div>
    <hr>
    @if ($links->isNotEmpty())
    <div class="container-fluid">
        <div class="stri">
            @foreach ($links as $link)
            <div class="row">
                <div class="col-12 d-flex justify-content-start mt-3">
                    <div>
                        <p>{{$link->created_at->format('d/m/Y')}}</p>
                    </div>
                    <div class="ml-3">
                        <p><b>{{$link->category->name}}</b></p>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center mt-1 mb-1">
                    <div>
                        <p class="word-break">{{$link->title}}</p>
                    </div>
                    <div>
                        <a href="{{$link->url}}" class="btn btn-link a" role="button">
                            <div style="font-size: 25px;"><i class='fas fa-link'></i></div>
                        </a>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-between p-0">
                    <div>
                        <div class="col-12 d-flex justify-content-start">
                            @if($link->city_id!=null)
                            <div>
                                <p>{{$link->city->name}}</p>
                            </div>
                            @endif
                            @if($link->user->company)
                            <div class="ml-3">
                                <b class="ad_tab">Anuncio</b>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if($link->price>0)
                    <div class="mr-3">
                        <h6><b>{{number_format($link->price,0,",",".")}}&nbsp;€</b></h6>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-12">
            {{$links->links()}}
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-12">
            <p>
                <h4 class="bg-dark" style="color:white">No hay enlaces.</h4>
            </p>
        </div>
    </div>
    @endif
</div>
@endsection
