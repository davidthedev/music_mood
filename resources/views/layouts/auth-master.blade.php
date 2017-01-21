@extends('layouts.master')

@section('wrapper')
    <body class="admin">
        <header class="navbar-top">
            <a href="{{ route('index') }}" class="navbar-brand">MusicMood</a>
        </header>
        <div class="site-wrapper admin">
            <div class="grid">
                <div class='form-wrapper'>
                    @yield('form-section')
                </div>
            </div>

        </div>
    </body>
    <script src="{{ asset('js/admin-scripts.js') }}"></script>
@endsection
