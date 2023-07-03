<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel">
                        <!--LOGO-->
                    </div>

                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle rounded-3 p-1  fit-content"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('host') }}">{{ __('Dashboard') }}</a>
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
        </nav> --}}

        <nav class="navbar navbar-expand-md ">
            <div class="container">
                <a class="navbar-brand text-uppercase" href="{{ route('host.dashboard') }}"><img src="/public/img"
                        alt="logo"></a>
                <button class="navbar-toggler ah-hamburger-border" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('host.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase"
                                href="{{ route('host.apartments.index') }}">Apartments</a>
                        </li>
                        <li class="nav-item dropdown">
                            @auth
                                @if (empty(Auth::user()->name))
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle rounded-3 p-1 fit-content"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        Dajeee romaaaaa Dajee
                                    </a>
                                @else
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle rounded-3 p-1 fit-content"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                @endif
                            @endauth

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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
