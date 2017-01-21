<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artist_id',
        'genre_id',
        'mood_id',
        'title',
        'video_token'
    ];

    /**
     * Get the artist for the record
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * Get the genre for the record
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * Get the mood for the record
     */
    public function mood()
    {
        return $this->belongsTo(Mood::class);
    }


    public function processArtist($request)
    {
        if (!empty($request->artist)) {
            $artist = new Artist;
            $artist->artist = $request->artist;
            $artist->save();
            return $artist->id;
        }
        return $request->artist_id;
    }

    /**
     * Store the genre and return id
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    public function processGenre($request)
    {
        if (!empty($request->genre)) {
            $genre = new Genre;
            $genre->genre = $request->genre;
            $genre->save();
            return $genre->id;
        }
        return $request->genre_id;
    }

    public function processMood($request)
    {
        if (!empty($request->mood)) {
            $mood = new Mood;
            $mood->mood = $request->mood;
            $mood->save();
            return $mood->id;
        }
        return $request->mood_id;
    }

    public function processLink($linkOrToken)
    {
        if (filter_var($linkOrToken, FILTER_VALIDATE_URL)) {
            $token = explode('?v=', $linkOrToken);
            return $token[1];
        }
        return $linkOrToken;
    }
}
