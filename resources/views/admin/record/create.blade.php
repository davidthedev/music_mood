@extends('admin.index')

@section('title', 'Add a new record')

@section('board-header')
    Add a new record
@endsection


@section('board-body')
    <div class="container">
        <form role="form" id="add-record" method="POST"
            action="{{ route('records.store') }}">
            {{ csrf_field() }}
            <select name="artist_id" class="form-field">
                <option value="default">Select artist</option>
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->artist }}</option>
                @endforeach
            </select>
            <button class="btn-add-field" id="add-artist" type="button">
                + Add artist
            </button>

            <select name="genre_id" class="form-field">
                <option value="default">Select genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                @endforeach
            </select>
            <button class="btn-add-field" id="add-genre" type="button">
                + Add genre
            </button>

            <select name="mood_id" class="form-field">
                <option value="default">Select mood</option>
                @foreach($moods as $mood)
                    <option value="{{ $mood->id }}">{{ $mood->mood }}</option>
                @endforeach
            </select>
            <button class="btn-add-field" id="add-mood" type="button">
                + Add mood
            </button>

            <input type="text" id="title" name="title" class="form-field"
                placeholder="Track title"/>
            <input type="text" id="video_token" name="video_token" class="form-field"
                placeholder="Track token"/>
            <button type="submit" class="btn btn-main">Save</button>
        </form>
    </div>
@endsection
