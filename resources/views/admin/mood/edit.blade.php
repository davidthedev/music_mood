@extends('admin.index')

@section('title', 'Edit mood')

@section('board-header')
    Edit mood
@endsection

@section('board-body')
    <div class="container">
        <form role="form" method="POST" action="{{ route('moods.update', [$mood->id]) }}">
            {{ csrf_field() }} {{ method_field('PUT') }}
                <input type="text" id="mood" class="form-field" name="mood"
                    placeholder="mood" value="{{ $mood->mood }}"/>

            <a href="{{ route('moods.index') }}" class="btn btn-main">
                Back to all genres
            </a>
            <button type="submit" class="btn btn-update">Update</button>
        </form>
    </div>
@endsection
