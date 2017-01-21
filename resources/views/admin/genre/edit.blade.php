@extends('admin.index')

@section('title', 'Edit genre')

@section('board-header')
    Edit genre
@endsection

@section('board-body')
    <div class="container">
        <form role="form" method="POST" action="{{ route('genres.update', [$genre->id]) }}">
            {{ csrf_field() }} {{ method_field('PUT') }}
                <input type="text" id="genre" class="form-field" name="genre"
                    placeholder="genre" value="{{ $genre->genre }}"/>

            <a href="{{ route('genres.index') }}" class="btn btn-main">
                Back to all genres
            </a>
            <button type="submit" class="btn btn-update">Update</button>
        </form>
    </div>
@endsection
