@extends('admin.index')

@section('title', 'Genres')

@section('board-header')
    Genres
@endsection

@section('board-body')
    <table class="table">
        <thead>
            <tr>
                <th class="id-col">Id</th>
                <th>Genre</th>
                <th class="edit-col centered"></th>
                <th class="dlt-col centered"></th>
            </tr>
        </thead>
        <tbody>
            @if(count($genres) > 0)
                @foreach($genres as $genre)
                    <tr>
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->genre }}</td>
                        <td class="centered">
                            <a href="{{ route('genres.edit', [$genre->id]) }}">
                                <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="centered">
                            <form method="POST" action="{{ route('genres.destroy', [$genre->id]) }}">
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
                    <td colspan="4">No genres yet</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
