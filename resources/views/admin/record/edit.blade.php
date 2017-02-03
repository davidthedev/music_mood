@extends('admin.index')

@section('title', 'Edit record')

@section('board-header')
    Edit record
@endsection

@section('board-body')
    <div class="container">
        <form role="form" method="POST" action="{{ route('records.update', [$record->id]) }}"
        id="record-form">
            {{ csrf_field() }} {{ method_field('PUT') }}

            <label for="artist_id">Artist</label>
            <select name="artist_id" class="form-field">
                <option value="default">Select artist</option>
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}"
                    {{ $artist->id == $record->artist->id ? 'selected' : '' }}>
                        {{ $artist->artist }}
                    </option>
                @endforeach
            </select>
            <button class="btn-add-field" id="add-artist" type="button">
                + Add artist
            </button>

            <label for="genre_id">Genre</label>
            <select name="genre_id" class="form-field">
                <option value="default">Select genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}"
                    {{ $genre->id == $record->genre->id ? 'selected' : '' }}>
                        {{ $genre->genre }}
                    </option>
                @endforeach
            </select>
            <button class="btn-add-field" id="add-genre" type="button">
                + Add genre
            </button>

            <label for="mood_id">Mood</label>
            <select name="mood_id" class="form-field">
                <option value="default">Select mood</option>
                @foreach($moods as $mood)
                    <option value="{{ $mood->id }}"
                    {{ $mood->id == $record->mood->id ? 'selected' : '' }}>
                        {{ $mood->mood }}
                    </option>
                @endforeach
            </select>
            <button class="btn-add-field" id="add-mood" type="button">
                + Add mood
            </button>

            <label for="title">Title</label>
            <input type="text" id="title" class="form-field" name="title"
            placeholder="title" value="{{ $record->title }}" required/>

            <label for="video_token">Video Token</label>
            <input type="text" id="video_token" class="form-field" name="video_token"
            placeholder="video token" value="{{ $record->video_token }}" required/>

            <a href="{{ route('records.index') }}" class="btn btn-main">
                Back to all records
            </a>
            <button type="submit" class="btn btn-update">Update</button>
        </form>
    </div>
@endsection
