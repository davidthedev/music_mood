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
}
