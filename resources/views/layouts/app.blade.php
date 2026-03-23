<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:400,500,700,900" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="text-slate-800 bg-yellow-50/10">
    <div id="app">
            <nav class="flex bg-yellow-50/90 shadow-sm py-1.5">
                <div class="container max-w-7xl flex items-center">
                    <a class="text-xl" href="{{ url('/') }}" title="Courier City">
                        <img src="{{asset('images/logobig.png')}}" width="332" height="37" alt="{{ config('app.name', 'Laravel') }}">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse lg:visible flex w-full gap-3" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="flex justify-center gap-8 flex-1">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('homepage') ? 'active' : '' }}" href="{{ route('homepage') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('trackingPage') ? 'active' : '' }}" href="{{ route('trackingPage') }}">Tracking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('aboutPage') ? 'active' : '' }}" href="{{ route('aboutPage') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('contactPage') ? 'active' : '' }}" href="{{ route('contactPage') }}">Contact</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="flex ms-auto gap-3">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
            <main>
                @yield('content')
            <main>
    </div>
</body>
</html>
