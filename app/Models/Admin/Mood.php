<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mood'
    ];

    /**
     * Disable timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Get the records for the mood
     */
    public function record()
    {
        return $this->hasMany(Record::class);
    }
}
