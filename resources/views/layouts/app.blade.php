<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                @else
                <a class="navbar-brand" href="{{ url('/') }}">
                    Тест
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 300px">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('home')}}">Предметы</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('student-studentresult')}}">Результат</a> </li>
                        @guest
                          <li class="nav-item"></li>
                        @else
                          @if(auth()->user()->role->name == 'admin')
                            <li class="nav-item"> <a class="nav-link" href="{{ route('predmet-index')}}">Добавить предмет</a> </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#"  id="client" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Вопросы</a> 
                                <div style="border: 0px" class="dropdown-menu" aria-labelledby="client">
                                    <a class="dropdown-item" href="{{ route('question-create')}}">Добавить</a>
                                <a class="dropdown-item" href="{{route('question-index')}}">Все вопросы</a>
                                {{-- <a class="dropdown-item" href="{{route('appointment-dashboard')}}">Главный</a> --}}
                                </div>   
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#"  id="client" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Студенты</a> 
                                <div style="border: 0px" class="dropdown-menu" aria-labelledby="client">
                                    <a class="dropdown-item" href="{{ route('student-index')}}">Все студенты</a>
                                    <a class="dropdown-item" href="{{route('student-create')}}">Добавить студент</a>
                                {{-- <a class="dropdown-item" href="{{route('appointment-dashboard')}}">Главный</a> --}}
                                </div>   
                            </li>
                            @endif
                        @endguest

                    </ul>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
