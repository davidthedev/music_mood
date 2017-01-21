@extends('layouts.auth-master')

@section('title', 'Email password')

@section('form-section')
    <h3>Enter your email</h3>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Address</label>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input id="email" type="email" class="form-control" name="email"
                value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-main">
                Send Password Reset Link
            </button>
        </div>
    </form>

@stop
