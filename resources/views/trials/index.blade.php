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
        <b>Estás viendo:</b>&nbsp;<a class="a" href="{{route('trials.index')}}">{{$title}}</a>
    </div>
</div>
<br>
@if ($users->isNotEmpty())
<div class="col-12 d-flex justify-content-end p-0">
    <div>
        <a class="a_nav" href="{{route('trials.init')}}"><b>Iniciar pruebas</b></a>
    </div>
</div>
<br>
@endif
@if ($users->isNotEmpty())
<div class="row">
    <div class="col-12">
        <table style="width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th>&nbsp;Borrar</th>
                    <th>Empresa</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Editar&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr style="padding-bottom: 10px;">
                    <td>
                        <form action="{{route('users.destroy',$user)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button style="padding:0" class="btn btn-link a" type="submit">
                                <i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    <td>
                        <a style="padding:0" href="{{route('users.show', $user)}}" class="btn btn-link a"
                            role="button">{{$user->profile->company_name}}
                        </a>
                    </td>
                    <td>{{$user->profile->address}}</td>
                    <td>{{$user->profile->phone}}</td>
                    <td>
                        <a style="padding:0" href="{{route('users.edit', $user)}}" class="btn btn-link a"
                            role="button"><i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>
{{-- <div class="row">
    <div class="col-12">
        {{$users->links()}}
</div>
</div> --}}
@else
<div class="row">
    <div class="col-12">
        <p>
            <h4 class="bg-dark" style="color:white">No hay pruebas pendientes.</h4>
        </p>
    </div>
</div>
@endif
@endsection