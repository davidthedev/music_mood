@extends('admin.index')

@section('title', 'Moods')

@section('board-header')
    Moods
@endsection

@section('board-body')
    <table class="table">
        <thead>
            <tr>
                <th class="id-col">Id</th>
                <th>Mood</th>
                <th class="edit-col centered"></th>
                <th class="dlt-col centered"></th>
            </tr>
        </thead>
        <tbody>
            @if(count($moods) > 0)
                @foreach($moods as $mood)
                    <tr>
                        <td>{{ $mood->id }}</td>
                        <td>{{ $mood->mood }}</td>
                        <td class="centered">
                            <a href="{{ route('moods.edit', [$mood->id]) }}">
                                <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="centered">
                            <form method="POST" action="{{ route('moods.destroy', [$mood->id]) }}">
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
                    <td colspan="4">No moods yet</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
