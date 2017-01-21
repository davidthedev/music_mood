@extends('layouts.main')

@section('title', 'Home')

@section('main-content')
    @section('header')
        <header class="main-header">
            <div class="container">
                <h1>Hello! What mood are you in today?</h1>
            </div>
        </header>
    @show
    <div class="container">

        <div class="youtube-container">
            <div id="youtube-player">
                <script type="text/javascript" src="https://www.youtube.com/player_api"></script>
            </div>
        </div>

        <button class="hide-menu" id="hide-menu" type="button">
            <i class="fa fa-caret-up fa-3x" aria-hidden="true"></i>
        </button>

        <form method="GET" action="{{ route('search') }}" id="record-search"
            class="record-search-showing">
            {{ csrf_field() }}
            <select name="mood" class="form-item">
                <option value="">No mood</option>
                @if($moods)
                    @foreach($moods as $mood)
                        <option value="{{ $mood->id }}">{{ $mood->mood }}</option>
                    @endforeach
                @endif
            </select>

            <select name="genre" class="form-item">
                <option value="">No genre</option>
                @if($genres)
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                    @endforeach
                @endif
            </select>

            <div class="btn-group cf">
                <button type="submit" name="search" value="generate" id="search-request"
                    class="btn btn-search flt-lft">Gimme that!</button>
                <button type="submit" name="search" value="randomize"
                    class="btn btn-randomizer flt-right">Surprise me!</button>
            </div>
        </form>

        <a href="#playlist"></a>

        <div class="table-responsive" id="table-responsive">
            <table class="table-playlist" id="playlist">
                @if(isset($records) && count($records) > 0)
                    <thead>
                        <th></th>
                        <th>Title</th>
                        <th>Artist</th>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                            <tr data-id="{{ $record->video_token }}">
                                <td class="play-pause">
                                    <i class="fa" aria-hidden="true"></i>
                                </td>
                                <td>{{ $record->artist->artist }}</td>
                                <td>{{ $record->title }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                @elseif(isset($records) && count($records) == 0)
                    <thead>
                        <th></th>
                        <th>Title</th>
                        <th>Artist</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3">
                                No tracks in this category yet
                            </td>
                        </tr>
                    </tbody>
                @endif
            </table>
            @if(isset($records) && $records instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{
                    $records->appends([
                    'mood' => $currentMood,
                    'genre' => $currentGenre])
                        ->fragment('playlist')->links()
                }}
            @endif
        </div>
    </div>
    @parent
@endsection
