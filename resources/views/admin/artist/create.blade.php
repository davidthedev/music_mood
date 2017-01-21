@extends('admin.index')

@section('title', 'Add a new artist')

@section('board-header')
    Add a new artist
@endsection

@section('board-body')
    <div class="container">
        <form role="form" method="POST" action="{{ route('artists.store') }}">
            {{ csrf_field() }}
            <input type="text" id="artist" name="artist" class="form-field"
                placeholder="Artist name"/>
            <button type="submit" class="btn btn-main">Save</button>
        </form>
    </div>
@endsection
