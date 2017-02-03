@extends('layouts.admin-main')

@section('title', 'Admin Panel')

@section('sidebar-section')
    <div class="nav-menu-bar cf" id="nav-menu-bar">
        <div class="nav-menu-text">Menu</div>
        <div class="nav-mobile" id="nav-mobile">
            <div class="nav-bar1"></div>
            <div class="nav-bar2"></div>
            <div class="nav-bar3"></div>
        </div>
    </div>

    <ul class="nav" id="nav">
        <li>
            <a href="{{ route('records.index') }}" class="nav-main-item centered">Records</a>
            <ul class="nav">
                <li><a href="{{ route('records.index') }}">Manage records</a></li>
                <li><a href="{{ route('records.create') }}">Add a new record</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('genres.index') }}" class="nav-main-item centered">Genres</a>
            <ul class="nav">
                <li><a href="{{ route('genres.index') }}">Manage genres</a></li>
                <li><a href="{{ route('genres.create') }}">Add a new genre</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('moods.index') }}" class="nav-main-item centered">Moods</a>
            <ul class="nav">
                <li><a href="{{ route('moods.index') }}">Manage moods</a></li>
                <li><a href="{{ route('moods.create') }}">Add a new mood</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('artists.index') }}" class="nav-main-item centered">Artists</a>
            <ul class="nav">
                <li><a href="{{ route('artists.index') }}">Manage artists</a></li>
                <li><a href="{{ route('artists.create') }}">Add a new artist</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('user.index') }}" class="nav-main-item centered">Account details</a>
            <ul class="nav">
                <li><a href="{{ route('user.index') }}">Update details</a></li>
                <li><a href="{{ route('user.password') }}">Update password</a></li>
            </ul>
        </li>
    </ul>
@endsection

@section('main-section')
    <section class="board">
        <header class="board-head">
            <div class="centered h5">
                @yield('board-header')
            </div>
        </header>
        <div class="board-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="table-responsive">
                @yield('board-body')
            </div>
        </div>
    </section>
@endsection
