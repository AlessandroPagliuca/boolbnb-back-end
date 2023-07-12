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
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand text-uppercase" href="{{ route('host.dashboard') }}">
                    <img src="{{ asset('/img/logo-boolbnb.png') }}" style="width: 50px; height: 50px; object-fit:cover;"
                        alt="logo"></a>

                <button class="navbar-toggler ah-hamburger-border text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                        <li class="nav-item ">
                            <a class="nav-link text-uppercase {{ request()->routeIs('host.dashboard') ? 'active' : '' }}"
                                href="{{ route('host.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-uppercase {{ request()->routeIs('host.apartments.*') ? 'active' : '' }}"
                                href="{{ route('host.apartments.index') }}">Apartments</a>
                        </li>
                        <li class="nav-item dropdown">
                            @auth
                                @if (empty(Auth::user()->name) && empty(Auth::user()->surname))
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle fit-content" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        User
                                    </a>
                                @else
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle fit-content" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->name }} {{ Auth::user()->surname }}
                                    </a>
                                @endif
                            @endauth

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-decoration-none" href="{{ route('logout') }}"
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


        <main>
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>

</html>
