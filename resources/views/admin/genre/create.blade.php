@extends('admin.index')

@section('title', 'Add a new genre')

@section('board-header')
    Add a new genre
@endsection

@section('board-body')
    <div class="container">
        <form role="form" method="POST" action="{{ route('genres.store') }}">
            {{ csrf_field() }}
            <input type="text" id="genre" name="genre" class="form-field"
                placeholder="Genre name"/>
            <button type="submit" class="btn btn-main">Save</button>
        </form>
    </div>
@endsection
