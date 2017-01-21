@extends('admin.index')

@section('title', 'Artists')

@section('board-header')
    Artists
@endsection

@section('board-body')
    <table class="table">
        <thead>
            <tr>
                <th class="id-col">Id</th>
                <th>Artist</th>
                <th class="edit-col centered"></th>
                <th class="dlt-col centered"></th>
            </tr>
        </thead>
        <tbody>
            @if(count($artists) > 0)
                @foreach($artists as $artist)
                    <tr>
                        <td>{{ $artist->id }}</td>
                        <td>{{ $artist->artist }}</td>
                        <td class="centered">
                            <a href="{{ route('artists.edit', [$artist->id]) }}">
                                <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="centered">
                            <form method="POST" action="{{ route('artists.destroy', [$artist->id]) }}">
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
                    <td colspan="4">No artists yet</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
