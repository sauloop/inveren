<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inverenlace - @yield('title')</title>
    @isset($description)
    <meta name="description" content=@yield('description')>
    @endisset
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css?version=152')}}">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('favicon-bell-o.ico') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <div class="col-12 p-0">
                        <div class="col-12 d-flex justify-content-between p-0">
                            <div>
                                <a class="navbar-brand" href="{{route('index')}}">
                                    <div class="d-flex justify-content-start">
                                        <div id="logo"><i class="far fa-bell"></i></div>
                                        <div id="texto-logo">&nbsp;&nbsp;Inverenlace</div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <div class="col-12 d-flex justify-content-end mt-1 mb-3 p-0">
                                    <div>
                                        <button class="navbar-toggler" data-toggle="collapse"
                                            data-target="#collapse_target">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse navbar-collapse" id="collapse_target">
                                    @if(!auth()->check())
                                    <div class="nav-link nav_link_text p-0 ml-4 mb-3">
                                        <a href="{{route('login')}}" class="a_th">Publicar enlace</a>
                                    </div>
                                    @else
                                    @if(auth()->user()->isCompany())
                                    <div class="nav-link nav_link_text p-0 ml-4 mb-3">
                                        <a href="{{route('ads.create')}}" class="a_th">Publicar enlace</a>
                                    </div>
                                    @else
                                    <div class="nav-link nav_link_text p-0 ml-4 mb-3">
                                        <a href="{{route('links.create')}}" class="a_th">Publicar enlace</a>
                                    </div>
                                    @endif
                                    @endif
                                    @admin
                                    <div class="nav-link nav_link_text p-0 ml-4 mb-3">
                                        <a href="{{route('admin_dashboard')}}" class="a_th">Administrar</a>
                                    </div>
                                    @endadmin
                                    @company
                                    <div class="nav-link nav_link_text p-0 ml-4 mb-3">
                                        <a href="{{route('company_dashboard')}}" class="a_th">Gestionar cuenta</a>
                                    </div>
                                    @endcompany
                                    {{-- <div class="nav-link nav_link_text p-0 ml-4 mb-3">
                                        <a href="{{route('contact')}}" class="a_th">Contacto</a>
                                    </div> --}}
                                    <div class="nav-link nav_link_text p-0 ml-4 mb-3">
                                        <a href="{{route('about')}}" class="a_th">Acerca de</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Authentication Links -->
                        <div class="col-12 btn-group dropdown d-flex justify-content-end p-0">
                            @guest
                            <div class="nav_link_text">
                                <a class="nav-link a_th p-0" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                            </div>
                            @if (Route::has('register'))
                            <div class="nav_link_text ml-4">
                                <a class="nav-link a_th p-0" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </div>
                            @endif
                            @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle a_th nav_link_text p-0" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav_link_text"
                                aria-labelledby="navbarDropdown">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <a class="dropdown-item a" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                                        </a>
                                    </div>
                                </div>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            @endguest
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <main>
        <div>
            @yield('content')
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
