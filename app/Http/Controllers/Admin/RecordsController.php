<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Mood;
use App\Models\Admin\Genre;
use App\Models\Admin\Record;
use App\Models\Admin\Artist;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $data = $this->validateAndSetMultiple($request);

        $record = new Record;
        $record->artist_id = $data['artist_id'];
        $record->genre_id = $data['genre_id'];
        $record->mood_id = $data['mood_id'];
        $record->title = $request->title;
        // full youtube link or token id can be imported
        // and we will check it here
        $record->video_token = $this->processLink($request->video_token);
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
        $record = Record::where(['id' => $record->id])->first();

        $artists = Artist::all()->sortBy('artist');
        $genres = Genre::all()->sortBy('genre');
        $moods = Mood::all()->sortBy('mood');

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
        $data = $this->validateAndSetMultiple($request);

        $record->artist_id = $data['artist_id'];
        $record->genre_id = $data['genre_id'];
        $record->mood_id = $data['mood_id'];
        $record->title = $data['title'];
        // full youtube link or token id can be imported
        // and we will check it here
        $record->video_token = $this->processLink($request->video_token);
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

    /**
     * Validate multiple request parameters and return their values
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function validateAndSetMultiple($request)
    {
        // get artist id
        if (isset($request->artist)) {
            $this->validate($request, ['artist' => 'required|max:50']);

            // check if new artist already exists
            if ($artist = Artist::where('artist', $request->artist)->first()) {
                $artistId = $artist->id;
            } else {
                $artist = $request->artist;
                $artist = new Artist;
                $artist->artist = $request->artist;
                $artist->save();
                $artistId = $artist->id;
            }
        } else {
            Validator::make([
                'artist_id' => $request->artist_id
                ], [
                'artist_id' => [
                    'required',
                    Rule::exists('artists')->where(function ($query) {
                        $query->where('id', $request->artist_id);
                    }),
                ],
            ]);

            $artistId = $request->artist_id;
        }

        // get genre id
        if (isset($request->genre)) {
            $this->validate($request, ['genre' => 'required|alpha|max:50']);

            // check if new genre already exists
            if ($genre = Genre::where('genre', $request->genre)->first()) {
                $genreId = $genre->id;
            } else {
                $genre = $request->genre;
                $genre = new Genre;
                $genre->genre = $request->genre;
                $genre->save();
                $genreId = $genre->id;
            }
        } else {
            Validator::make([
                'genre_id' => $request->genre_id
                ], [
                'genre_id' => [
                    'required',
                    Rule::exists('genres')->where(function ($query) {
                        $query->where('genre_id', $request->genre_id);
                    }),
                ],
            ]);

            $genreId = $request->genre_id;
        }

        // get mood id
        if (isset($request->mood)) {
            $this->validate($request, ['mood' => 'required|alpha|max:50']);

            // check if new mood already exists
            if ($mood = Mood::where('mood', $request->mood)->first()) {
                $moodId = $mood->id;
            } else {
                $mood = $request->mood;
                $mood = new Mood;
                $mood->mood = $request->mood;
                $mood->save();
                $moodId = $mood->id;
            }
        } else {
            Validator::make([
                'mood_id' => $request->mood_id
                ], [
                'mood_id' => [
                    'required',
                    Rule::exists('moods')->where(function ($query) {
                        $query->where('mood_id', $request->mood_id);
                    }),
                ],
            ]);
            $moodId = $request->mood_id;
        }

        $this->validate($request, [
            'title' => 'required|max:100',
            'video_token' => 'required'
        ]);

        return [
            'artist_id' => $artistId,
            'genre_id' => $genreId,
            'mood_id' => $moodId,
            'title' => $request->title
        ];
    }

    /**
     * Process user entered YouTube link or video token
     *
     * @param  string $linkOrToken
     * @return string
     */
    protected function processLink($linkOrToken)
    {
        if (filter_var($linkOrToken, FILTER_VALIDATE_URL)) {
            $token = explode('?v=', $linkOrToken);
            return $token[1];
        }
        return $linkOrToken;
    }
}
