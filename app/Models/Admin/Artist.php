<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artist'
    ];

    /**
     * Disable timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Get the records for the artist
     */
    public function record()
    {
        return $this->hasMany(Record::class);
    }
}
