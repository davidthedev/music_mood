@extends('layouts.auth-master')

@section('title', 'Register')

@section('form-section')
    <h3>Register</h3>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="">Name</label>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <input id="name" type="text" class="form-control"
                name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="">E-Mail Address</label>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="">
                <input id="email" type="email" class="form-control"
                    name="email" value="{{ old('email') }}" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="">Password</label>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input id="password" type="password" class="form-control"
                name="password" required>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="">
                Confirm Password</label>
            <div class="">
                <input id="password-confirm" type="password" class="form-control"
                    name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <div class="">
                <button type="submit" class="btn btn-main">
                    Register
                </button>
            </div>
        </div>
    </form>
@endsection
