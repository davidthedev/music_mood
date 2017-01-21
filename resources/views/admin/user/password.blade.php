@extends('admin.index')

@section('title', 'Password update')

@section('board-header')
    Password details
@endsection

@section('board-body')
    <div class="container">
        <form role="form" method="POST" action="{{ route('user.password.update') }}">
            {{ csrf_field() }} {{ method_field('PUT') }}

            <input type="password" id="old_password" class="form-field" name="old_password"
                placeholder="old password"/>

            <input type="password" id="new_password" class="form-field" name="new_password"
                placeholder="new password"/>

            <a href="{{ route('records.index') }}" class="btn btn-main">
                Back to main menu
            </a>
            <button type="submit" class="btn btn-update">Update</button>
        </form>
    </div>
@endsection
