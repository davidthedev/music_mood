@extends('layouts.master')

@section('wrapper')
    <body class="main">
        <div class="site-wrapper main">
            <header class="site-header">
                <div class="header">
                    <div class="top-menu">
                        <div class="col-1-1">
                            <ul>
                                @if(Auth::guest())
                                    <li>
                                        <a class="top-menu-text" href="{{ route('login') }}">
                                            Login
                                        </a>
                                    </li>
                                    <li>
                                        <a class="top-menu-text" href="{{ route('register') }}">
                                            Register
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <form id="logout-form" action="{{ url('/logout') }}"
                                            method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                            class="top-menu-text" href="{{ url('/logout') }}">
                                            Log out
                                        </a>
                                    </li>
                                    <li class="welcome-msg">
                                        <a class="top-menu-text" href="{{ route('admin') }}"
                                            target="_blank">
                                            Welcome, {{ Auth::user()->name }}!
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="custom-header">
                        <img src="{{ asset('images/header_img.jpg') }}">
                    </div>

                    <div class="text-header">
                        <h1><a href="{{ route('index') }}">Music Mood</a></h1>
                        <h3>Listen to music that feels right</h3>
                    </div>
                </div>
            </header>
            <div class="site-content cf">
                <div class="col-1-1">
                    @yield('main-content')
                </div>
            </div>

        </div>
    </body>
    <footer id="footer" class="cf">
        <div class="footer-left">
            <h2>{{ config('app.name') }}</h2>
            <p class="footer-about"><a href="{{ route('admin') }}">User area</a></p>
            <p class="footer-copyright">{{ config('app.name') }} &copy; {{ date('Y') }}</p>
        </div>
        <div class="footer-right">
            <h2>About the project</h2>
            <p class="footer-about">MM is a playlist generator. It creates playlists
                music / video playlists based on the selected mood / genre. You can also create
                an free account to compile your own playlists. Enjoy!</p>
        </div>
    </footer>
    <script src="{{ asset('js/youtube.js') }}"></script>
    <script src="{{ asset('js/main-scripts.js') }}"></script>
@endsection
