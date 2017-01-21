@extends('admin.index')

@section('title', 'User details')

@section('board-header')
    User details
@endsection

@section('board-body')
    <div class="container">
        <form role="form" method="POST" action="{{ route('user.update') }}">
            {{ csrf_field() }} {{ method_field('PUT') }}

            <input type="text" id="name" class="form-field" name="name"
                placeholder="name" value="{{ $user->name }}"/>

            <input type="text" id="email" class="form-field" name="email"
                placeholder="email" value="{{ $user->email }}"/>

            <a href="{{ route('records.index') }}" class="btn btn-main">
                Back to main menu
            </a>
            <button type="submit" class="btn btn-update">Update</button>
        </form>
    </div>
@endsection
