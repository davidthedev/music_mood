@extends('admin.index')

@section('title', 'Edit artist')

@section('board-header')
    Edit artist
@endsection

@section('board-body')
    <div class="container">
        <form role="form" method="POST" action="{{ route('artists.update', [$artist->id]) }}">
            {{ csrf_field() }} {{ method_field('PUT') }}
                <input type="text" id="genre" class="form-field" name="artist"
                    placeholder="artist" value="{{ $artist->artist }}"/>
            <button type="submit" class="btn btn-main">Update</button>
        </form>
    </div>
@endsection
