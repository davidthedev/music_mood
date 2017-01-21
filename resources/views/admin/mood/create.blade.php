@extends('admin.index')

@section('title', 'Add a new mood')

@section('board-header')
    Add a new mood
@endsection

@section('board-body')
    <div class="container">
        <form role="form" method="POST" action="{{ route('moods.store') }}">
            {{ csrf_field() }}
            <input type="text" id="mood" name="mood" class="form-field"
                placeholder="Mood name"/>
            <button type="submit" class="btn btn-main">Save</button>
        </form>
    </div>
@endsection
