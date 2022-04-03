<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>IndiGama</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&display=swap" rel="stylesheet"> 

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Mulish', sans-serif;
            }
        </style>
    </head>
<body>
    <nav class="navbar navbar-expand-lg container-header">
        <div class="wrapped-header row justify-content-between flex-row w-100">
            <div class="wrap-left w-auto">
                <div class="div-logo">
                    <img class="img-header-icon" src="/images/icon-indi-pair-color.svg" alt="logo-indi"/>
                </div>
            </div>
            <div class="wrap-mid flex-row w-auto">
                <div class="div-menu flex-row">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-row">
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
                    </ul>
                </div>
            </div>
            <div class="wrap-right w-auto">
                @guest
                    @if (Route::has('login'))
                        <div class="nav-item">
                            <a class="btn btn-login" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </div>
                    @endif
                @else
                    <div class="nav-item dropdown">
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
                    </div>
                @endguest
            </div>
            <div class="menu-toggle">
                <div class="hamburger">
                    <font-awesome-icon icon="fa-solid fa-bars" />
                </div>
            </div>
        </div>
    </nav>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
        </nav> --}}
        <!-- <header-component></header-component> -->
            @yield('content')
        <!-- <footer-component></footer-component> -->
    </div>
</body>

<style>
    @media screen and (min-width: 768px) {
        .container-header{
            height: 80px;
            padding: 0 20px;
            background-color: #fff;
        }

        .wrapped-header{
            display: flex;
        }

        .menu-item{
            display: block;
            padding: 0.5rem 1rem;
            padding-right: 1rem;
            padding-left: 1rem;
            color: #000;
            text-decoration: none;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        .active-menu{
            font-weight: 700;
        }

        .btn-login{
            background: transparent;
            border: 3px solid #000;
            width: 120px;
            height: 40px;
            font-weight: 700;
        }

        .menu-toggle {
            display: none;
        }
    }
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 8rem;
    }

    .navbar-brand {
        color: #ffffff;
        font-family: "Oswald", sans-serif;
        text-transform: uppercase;
    }

    .nav-list {
        list-style: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 80%;
        height: 100vh;
        background-color: #222222;
        padding: 4.4rem;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        z-index: 1250;
        text-transform: uppercase;
        transform: translateX(-100%);
        transition: transform 0.5s;
    }

    .nav-link:hover {
        border-bottom: 3px solid #ffffff;
    }

    .active {
        font-weight: 700;
        border-bottom: 3px solid #ffffff;
    }

    .open .nav-list {
        transform: translateX(0);
    }

    .menu-toggle {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 3.2rem;
        height: 3.2rem;
        cursor: pointer;
        transition: all 0.5s ease-in-out;
    }

    .hamburger {
        width: 2.4rem;
        height: 3px;
        background-color: #ffffff;
        border-radius: 2px;
        border: none;
        transition: all 0.7s ease-out;
    }

    .hamburger::before,
    .hamburger::after {
        content: "";
        position: absolute;
        width: 2.4rem;
        height: 3px;
        background-color: #ffffff;
        border-radius: 2px;
        border: none;
    }

    .hamburger::before {
        transform: translateY(-8px);
    }

    .hamburger::after {
        transform: translateY(8px);
    }
</style>
</html>
