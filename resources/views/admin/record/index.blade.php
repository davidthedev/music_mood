@extends('admin.index')

@section('title', 'Records')

@section('board-header')
    Records
@endsection

@section('board-body')
    <table class="table">
        <thead>
            <tr>
                <th class="id-col">Id</th>
                <th>Artist</th>
                <th>Title</th>
                <th>Video Token</th>
                <th>Genre</th>
                <th>Mood</th>
                <th class="edit-col centered"></th>
                <th class="dlt-col centered"></th>
            </tr>
        </thead>
        <tbody>
            @if(count($records) > 0)
                @foreach($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->artist->artist }}</td>
                        <td>{{ $record->title }}</td>
                        <td>{{ $record->video_token }}</td>
                        <td>{{ $record->genre->genre }}</td>
                        <td>{{ $record->mood->mood }}</td>
                        <td class="centered">
                            <a href="{{ route('records.edit', [$record->id]) }}">
                                <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="centered">
                            <form method="POST" action="{{ route('records.destroy', [$record->id]) }}">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button type="submit" name="delete" class="btn-delete">
                                    {!! '<i class="fa fa-trash-o fa-lg"></i>' !!}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No records yet</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $records->links() }}
@endsection
