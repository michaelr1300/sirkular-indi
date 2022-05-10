<!DOCTYPE html>
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

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body class="d-flex relative antialiased" style="background-color: #EBF1F7">
    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-2">
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
    <div class="col-md-2 d-none d-md-flex">
        <div class="shadow sticky-top bg-white w-100" style="height: 100vh">
            <div class="d-flex card-body flex-column justify-content-between px-0 h-100">
                <div class="text-center">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="img-header-icon" src="/images/icon-indi-pair-color.svg" alt="logo-indi"/>
                    </a>
                    <div class="mt-4">
                        <ul class="navbar-nav text-start mr-auto">
                            <li class="nav-item text-start p-0">
                                <a
                                  class="d-flex nav-link ps-3 pe-2 {{ Route::is('dashboard.order') ? 'active-sidebar' : 'sidebar-item text-secondary' }}"
                                  href="{{ route('dashboard.order') }}"
                                >
                                    <i class="mdi mdi-cart" style="font-size: 18px"></i>
                                    <div class="ms-2 my-auto">Pesanan</div>
                                </a>
                            </li>
                            <li class="nav-item  text-start p-0">
                                <a
                                  class="d-flex nav-link ps-3 pe-2  {{ Route::is('dashboard.product') ? 'active-sidebar' : 'sidebar-item text-secondary' }}"
                                  href="{{ route('dashboard.product') }}"
                                >
                                    <i class="mdi mdi-view-dashboard" style="font-size: 18px"></i>
                                    <div class="ms-2 my-auto">Produk</div>
                                </a>
                            </li>
                            <li class="nav-item text-start p-0">
                                <a
                                  class="d-flex nav-link ps-3 pe-2  {{ Route::is('dashboard.review') ? 'active-sidebar' : 'sidebar-item text-secondary' }}"
                                  href="{{ route('dashboard.review') }}"
                                >
                                    <i class="mdi mdi-star" style="font-size: 18px"></i>
                                    <div class="ms-2 my-auto">Review</div>
                                </a>
                            </li>
                            <li class="nav-item text-start p-0">
                                <a
                                  class="d-flex nav-link ps-3 pe-2 sidebar-item text-secondary"
                                  href="{{ route('dashboard.review') }}"
                                >
                                    <i class="mdi mdi-chat-processing-outline" style="font-size: 18px"></i>
                                    <div class="ms-2 my-auto">Chat</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <ul class="navbar-nav text-start mr-auto">
                        <li class="nav-item text-start p-0">
                            <a
                            class="d-flex nav-link ps-3 pe-2 sidebar-item text-danger"
                            style="font-weight: 900"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >  
                            <i class="mdi mdi-power" style="font-size: 18px"></i>
                            <div class="ms-2 my-auto">Logout</div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="app" class="col-12 col-md-10 items-top d-flex flex-column px-3 pt-3" style="background-color: #E4E5E6">
        @yield('content')
    </div>
</body>
</html>
