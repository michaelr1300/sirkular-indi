<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IndiGama</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-2">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="img-header-icon" src="/images/icon-indi-pair-color.svg" alt="logo-indi"/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Center Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="menu-item {{ request()->is('/') ? 'active-menu' : ''}}" aria-current="page" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="menu-item {{ request()->is('catalog') ? 'active-menu' : ''}}" href="/catalog">Katalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="menu-item {{ request()->is('about') ? 'active-menu' : ''}}" href="/about">Tentang INDI</a>
                        </li>
                        <li class="nav-item">
                            <a class="menu-item {{ request()->is('reviews*') ? 'active-menu' : ''}}" href="/reviews">Testimoni</a>
                        </li>
                        <li class="nav-item">
                            <a class="menu-item {{ request()->is('order*') ? 'active-menu' : ''}}" href="/order">Order</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <div class="nav-item">
                                <a class="btn btn-login" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </div>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        Profil
                                    </a>
                                    @if (Auth::user()->is_admin)
                                    <a class="dropdown-item" href="{{ route('dashboard.order') }}">
                                       Dashboard
                                    </a>
                                    @endif
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
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
        </main>
    </div>
</body>
@include('layouts.footer')
</html>