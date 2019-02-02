<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <!-- CSRF Token -->
        <meta content="{{ csrf_token() }}" name="csrf-token">
        <title>
            {{ config('app.name', 'Laravel') }}
        </title>
        <!-- Scripts -->
        <!--<script defer="" src="{{ asset('js/app.js') }}"> </script> PARA QUE FUNCIONE EL DATATABLE QUITAR ESTO-->
        <!-- Fonts -->
        <link href="//fonts.gstatic.com" rel="dns-prefetch">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Boostrap -->
        <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" rel="stylesheet">
        @yield('estilos')
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img alt="" src="{{asset('imagenes/logopag.png')}}" width="140px">                                              
                    </a>
                    <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                              @if(Auth::check() && Auth::user()->hasRole('Administrador'))
                                @include('navbar')
                              @else
                              <li class="nav-item">
                                  <a class="nav-link" href="/Evento/buscar" role="button">
                                    Buscar  Eventos
                                  </a>
                              </li>
                              @endif
                              @if(Auth::check() && Auth::user()->hasRole('Capturador'))
                              <li class="nav-item">
                                  <a class="nav-link" href="/Evidencias" role="button">
                                    Añadir evidencia
                                  </a>
                              </li>
                              @endif
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </li>
                            @endif @else
                            <li class="nav-item dropdown">
                                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre="">
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>
                                <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                  @if(Auth::check() && Auth::user()->hasRole('Administrador'))
                                  <a href="/Usuarios" class="dropdown-item">Administrar Usuarios</a>
                                  @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container mt-4">
                <!-- Mostrar cualquier error -->
                @include('errores')
                <!-- -->
                @yield('content')
                <!--JQuery-->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <!-- Latest compiled and minified JavaScript -->
                <script crossorigin="anonymous" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                @yield('scripts')
            </div>
        </div>
    </body>
</html>
