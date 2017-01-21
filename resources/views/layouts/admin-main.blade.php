@extends('layouts.master')

@section('wrapper')
    <body class="admin">
        <header class="navbar-top">
            <a href="{{ route('index') }}" class="navbar-brand" target="_blank">
                MusicMood
            </a>

            @if (!Auth::guest())
                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                    style="display: none;">
                    {{ csrf_field() }}
                </form>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
                    class="navbar-right">
                    Logout
                </a>
                <a class="navbar-right" role="button">
                    Welcome, {{ Auth::user()->name }}!
                </a>
            @endif
        </header>

        <div class="site-wrapper admin">
            <div class="grid">
                <div class="col-1-3">
                    <div id="sidebar-section">
                        @yield('sidebar-section')
                    </div>
                </div>
                <div class="col-2-3">
                    <div id="main-section">
                        @yield('main-section')
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('js/admin-scripts.js') }}"></script>
@endsection
