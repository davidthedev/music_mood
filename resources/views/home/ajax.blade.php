@if(count($records) > 0)
    <table class="table" id="playlist">
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
    </table>

    @if(isset($records) && $records instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{
            $records->appends([
            'mood' => $currentMood,
            'genre' => $currentGenre])
                ->fragment('playlist')->links()
        }}
    @endif
@endif
