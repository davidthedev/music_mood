<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Record;
use App\Models\Admin\Artist;
use App\Models\Admin\Genre;
use App\Models\Admin\Mood;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class RecordsController extends Controller
{
    /**
     * Check if user is authenticated
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the records.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::where(['user_id' => auth()->id()])->paginate(10);

        return view('admin.record.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new record
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::all()->sortBy('artist');
        $genres = Genre::all()->sortBy('genre');
        $moods = Mood::all()->sortBy('mood');

        return view('admin.record.create', [
            'artists' => $artists,
            'genres' => $genres,
            'moods' => $moods
        ]);
    }

    /**
     * Store a newly created record in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new Record;
        $record->artist_id = $record->processArtist($request);
        $record->genre_id = $record->processGenre($request);
        $record->mood_id = $record->processMood($request);
        $record->title = $request->title;
        $record->video_token = $record->processLink($request->video_token);
        $record->user_id = auth()->id();
        $record->save();

        return redirect()->route('records.index');
    }

    /**
     * Display the specified record
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the record
     *
     * @param  \App\Models\Admin\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        $artists = Artist::all();
        $genres = Genre::all();
        $moods = Mood::all();

        return view('admin.record.edit', [
            'record' => $record,
            'artists' => $artists,
            'genres' => $genres,
            'moods' => $moods
        ]);
    }

    /**
     * Update the specified record in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        // full youtube link or token id can be imported
        // and we will check it here
        $token = $record->processLink($request->video_token);

        $record->artist_id = $request->artist_id;
        $record->genre_id = $request->genre_id;
        $record->mood_id = $request->mood_id;
        $record->title = $request->title;
        $record->video_token = $token;
        $record->save();

        return redirect()->route('records.index');
    }

    /**
     * Remove the specified record from storage
     *
     * @param  \App\Models\Admin\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->route('records.index');
    }
}
