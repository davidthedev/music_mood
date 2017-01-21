<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'genre'
    ];

    /**
     * Disable timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Get the records for the genre
     */
    public function record()
    {
        return $this->hasMany(Record::class);
    }
}
