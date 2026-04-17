<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon"  href="{{ asset('favicon.ico') }}" sizes="48x48" />
    <link rel="canonical" href="{{ url()->current() }}">
    <title>{{ $pageTitle ?? "Global Parcel Delivery Services from UK to Worldwide" }}</title>
    {{-- Meta Description --}}
    <meta name="description" content="{{ $pageDescription ?? 'Courier City provides parcel services from the UK to Europe, Canada, USA, and India. Secure, fast, and professional delivery for businesses and individuals' }}">
    {{-- Open Graph (Facebook, LinkedIn) --}}
    <meta property="og:title" content="{{ $pageTitle ?? "Global Parcel Delivery Services from UK to Worldwide" }}">
    <meta property="og:description" content="{{ $pageDescription ?? "Global Parcel Delivery Services from UK to Worldwide" }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/default-og.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Courier City Ltd.">
    <meta property="og:image:secure_url" content="{{ $ogImage ?? asset('images/default-og.jpg') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle ?? "Global Parcel Delivery Services from UK to Worldwide" }}">
    <meta name="twitter:description" content="{{ $pageDescription ?? "Global Parcel Delivery Services from UK to Worldwide" }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/default-og.jpg') }}">

    @yield('extra-meta') {{-- For page-specific extras --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:400,500,700,900" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-slate-800 bg-yellow-50/10">
    <div id="app">
        <div class="bg-primary">
            <div class="container max-w-7xl text-white mx-auto flex flex-col lg:flex-row gap-1 lg:gap-4 items-stretch lg:items-center justify-center lg:justify-between">
                <div class="flex justify-between gap-1 py-1">
                    <a href="{{route('homepage')}}" class="{{ request()->routeIs('homepage') ? 'text-white bg-secondary hover:bg-primary' : 'text-white hover:text-white hover:bg-secondary' }} text-shadow-xs text-shadow-gray-500 rounded-xl font-bold tracking-widest uppercase text-xs inline-flex  py-1 px-4">Home</a>
                    <a href="{{route('trackingPage')}}" class="{{ request()->routeIs('trackingPage') ? 'text-white bg-secondary hover:bg-primary' : 'text-white hover:bg-secondary' }} text-shadow-xs text-shadow-gray-500 rounded-xl font-bold tracking-widest uppercase text-xs inline-flex  py-1 px-2">Tracking</a>
                    <a href="{{route('aboutPage')}}" class="{{ request()->routeIs('aboutPage') ? 'text-white bg-secondary hover:bg-primary' : 'text-white hover:bg-secondary' }} text-shadow-xs text-shadow-gray-500 rounded-xl font-bold tracking-widest uppercase text-xs inline-flex  py-1 px-3 text-secondary">About</a>
                    <a href="{{route('contactPage')}}" class="{{ request()->routeIs('contactPage') ? 'text-white bg-secondary hover:bg-primary' : 'text-white hover:bg-secondary' }} text-shadow-xs text-shadow-gray-500 rounded-xl font-bold tracking-widest uppercase text-xs inline-flex  py-1 px-2 text-secondary">Contact</a>
                </div>
                <div class="font-medium flex items-center gap-2 justify-center py-1">
                    <i class="iconify" data-icon="mdi-phone"></i>
                    <span class="text-sm text-secondary font-bold">0208 573 0111 / 0755 311 3111</span>
                </div>
            </div>
        </div>
        <header class="flex bg-linear-to-r from-yellow-100 via-white to-orange-100 shadow-sm py-1.5 sticky top-0 z-20">
            <div class="container max-w-7xl py-1">
                <nav class="flex flex-col lg:flex-row gap-3 items-center justify-between">
                    <a class="text-xl" href="{{ route('homepage') }}" title="Courier City">
                        <img src="{{asset('images/logobig.png')}}" class="w-75 lg:w-83 drop-shadow-xs drop-shadow-gray-400" width="332" height="37" alt="Courier City">
                    </a>
                    <a class="nav-link {{ request()->routeIs('homepage') ? 'active' : '' }} hidden lg:inline-flex font-bold text-sm transition" href="{{ route('homepage') }}">Home</a>
                    <a class="nav-link {{ request()->routeIs('trackingPage') ? 'active' : '' }} hidden lg:inline-flex font-bold text-sm transition" href="{{ route('trackingPage') }}">Tracking</a>
                    <a class="nav-link {{ request()->routeIs('aboutPage') ? 'active' : '' }} hidden lg:inline-flex font-bold text-sm transition" href="{{ route('aboutPage') }}">About</a>
                    <a class="nav-link {{ request()->routeIs('contactPage') ? 'active' : '' }} hidden lg:inline-flex font-bold text-sm transition" href="{{ route('contactPage') }}">Contact</a>
                    @guest
                        @if (Route::has('login'))
                            <a class="text-sm bg-primary inline-flex items-center gap-1 text-white font-bold capitalize px-4 py-1.5 rounded-full shadow hover:bg-secondary justify-center" href="{{ route('login') }}">
                                Get Started <i class="iconify" data-icon="mdi-account"></i>
                            </a>
                        @endif

                        {{--                            @if (Route::has('register'))--}}
                        {{--                                <li class="nav-item">--}}
                        {{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--                                </li>--}}
                        {{--                            @endif--}}
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
                </nav>
{{--                <div class="collapse lg:visible flex w-full gap-3">--}}
                    <!-- Left Side Of Navbar -->
{{--                    <ul class="flex justify-center gap-8 flex-1">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ request()->routeIs('homepage') ? 'active' : '' }}" href="{{ route('homepage') }}">Home</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ request()->routeIs('trackingPage') ? 'active' : '' }}" href="{{ route('trackingPage') }}">Tracking</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ request()->routeIs('aboutPage') ? 'active' : '' }}" href="{{ route('aboutPage') }}">About</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ request()->routeIs('contactPage') ? 'active' : '' }}" href="{{ route('contactPage') }}">Contact</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                    <!-- Right Side Of Navbar -->
{{--                    <ul class="flex ms-auto gap-3">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link bg-primary text-white font-bold capitalize px-4 py-1.5 rounded-full shadow hover:bg-secondary" href="{{ route('login') }}">Get Started</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                 document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="bg-secondary border-t-4 border-primary pt-10 pb-2 relative">
            <img src="{{asset('images/footer-bg.jpg')}}" alt="footer" class="absolute top-0 w-full h-full" />
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-9">
                    <div class="col-span-1 md:col-span-1 space-y-6">
                        <div class="flex items-center gap-2">
                            <img alt="Courier City" class="h-8 w-auto" data-alt="Small Courier City brand logo"
                                 src="{{asset('images/logobig.png')}}"/>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            Modernizing city logistics with technology and speed. Your trusted partner for every
                            delivery, every day.
                        </p>
                        <div class="flex gap-4">
                            <a class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-background-dark transition-all"
                               href="#">
                                <span data-icon="mdi-share-variant" class="iconify"/>
                            </a>
                            <a class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-background-dark transition-all"
                               href="#">
                                <span data-icon="mdi-rss" class="iconify"/>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h5 class="font-bold text-primary uppercase tracking-wider text-base">Southall Comms</h5>
                        <h5 class="font-bold text-gray-200 mb-6 uppercase tracking-wider text-xs">Opp Fire Station</h5>
                        <ul class="space-y-4 text-sm text-slate-300">
                            <li class="flex flex-col gap-1">
                            <div class="flex items-center gap-1">
                                <i data-icon="mdi-map-marker" class="iconify text-primary"></i>
                                    <span class="text-sm">32 High Street, Southall, UB1 3DA</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i data-icon="mdi-phone" class="iconify text-primary"></i>
                                    <span class="text-sm">0208 571 9555</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i data-icon="mdi-whatsapp" class="iconify text-primary"></i>
                                    <span class="text-sm">0755 381 2222</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i data-icon="mdi-email" class="iconify text-primary"></i>
                                    <span class="text-sm">couriercityuk@gmail.com</span>
                            </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="font-bold text-primary uppercase tracking-wider text-base">Didar Tech</h5>
                        <h5 class="font-bold text-gray-200 mb-6 uppercase tracking-wider text-xs">Near Railway Station</h5>
                        <ul class="space-y-4 text-sm text-slate-300">
                            <li class="flex flex-col gap-1">
                            <div class="flex items-center gap-1">
                                <i data-icon="mdi-map-marker" class="iconify text-primary"></i>
                                    <span class="text-sm">12 Beaconsfield Road, Southall, UB1 1DW</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i data-icon="mdi-phone" class="iconify text-primary"></i>
                                    <span class="text-sm">0208 843 0092</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i data-icon="mdi-whatsapp" class="iconify text-primary"></i>
                                    <span class="text-sm">0788 833 8810</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i data-icon="mdi-email" class="iconify text-primary"></i>
                                    <span class="text-sm">couriercityuk@gmail.com</span>
                            </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pt-2 border-t border-primary flex flex-col md:flex-row justify-between items-center gap-2 lg:gap-4">
                    <p class="text-xs text-slate-300 uppercase lg:tracking-widest font-bold">
                        © 2024 Courier City Logistics. All rights reserved.</p>
                    <div class="flex gap-6 text-xs text-slate-300 font-bold uppercase tracking-widest">
                        <a class="hover:text-primary" href="#">Privacy Policy</a>
                        <a class="hover:text-primary" href="#">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>
