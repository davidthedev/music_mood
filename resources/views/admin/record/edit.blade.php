@extends('admin.index')

@section('title', 'Edit record')

@section('board-header')
    Edit record
@endsection

@section('board-body')
    <div class="container">
        <form role="form" method="POST" action="{{ route('records.update', [$record->id]) }}">
            {{ csrf_field() }} {{ method_field('PUT') }}

            <select name="artist_id" class="form-field">
                <option value="default">Select artist</option>
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}"
                        @if($record->artist_id == $artist->id)
                            selected="selected"
                        @endif>
                    {{ $artist->artist }}</option>
                @endforeach
            </select>

            <select name="genre_id" class="form-field">
                <option value="default">Select genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}"
                        @if($record->genre_id == $genre->id)
                            selected="selected"
                        @endif>
                    {{ $genre->genre }}</option>
                @endforeach
            </select>

            <select name="mood_id" class="form-field">
                <option value="default">Select mood</option>
                @foreach($moods as $mood)
                    <option value="{{ $mood->id }}"
                        @if($record->mood_id == $mood->id)
                            selected="selected"
                        @endif>
                    {{ $mood->mood }}</option>
                @endforeach
            </select>

            <input type="text" id="title" class="form-field" name="title"
                placeholder="title" value="{{ $record->title }}"/>

            <input type="text" id="video_token" class="form-field" name="video_token"
                placeholder="video token" value="{{ $record->video_token }}"/>


            <a href="{{ route('records.index') }}" class="btn btn-main">
                Back to all records
            </a>
            <button type="submit" class="btn btn-update">Update</button>
        </form>
    </div>
@endsection
