<?php

namespace App\Http\Controllers;

use App\Models\Admin\Mood;
use App\Models\Admin\Genre;
use Illuminate\Http\Request;
use App\Models\Admin\Record;

class HomeController extends Controller
{
    /**
     * Home index page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moods = Mood::all();
        $genres = Genre::all();

        return view('home.index', [
            'moods' => $moods,
            'genres' => $genres
        ]);
    }

    /**
     * Search for records
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $where = [];

        // get user id if logged in else use admin's id
        $where['user_id'] = auth()->guest() ? 1 : auth()->id();
        $where['mood_id'] = !empty($request->mood) ? $request->mood : '';
        $where['genre_id'] = !empty($request->genre) ? $request->genre : '';

        $where = array_filter($where, function ($value) {
            return $value != '';
        });

        // generate random playlist of 10 tracks
        if ($request->search === 'randomize') {
            $records = Record::where(['user_id' => $where['user_id']])->limit(10)
                                                                      ->inRandomOrder()
                                                                      ->get();
        } elseif ($request->search === 'generate') {
            $records = Record::where($where)->paginate(10);
        }

        // AJAX request
        if ($request->ajax()) {
            return view('home.ajax', [
                'currentMood' => isset($where['mood_id']) ? $where['mood_id'] : '',
                'currentGenre' => isset($where['genre_id']) ? $where['genre_id'] : '',
                'records' => $records
            ]);
        }

        // HTTP request
        return view('home.index', [
            'currentMood' => isset($where['mood_id']) ? $where['mood_id'] : '',
            'currentGenre' => isset($where['genre_id']) ? $where['genre_id'] : '',
            'moods' => Mood::all(),
            'genres' => Genre::all(),
            'records' => $records
        ]);
    }
}
