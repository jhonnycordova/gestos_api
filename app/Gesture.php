<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gesture extends Model
{
    protected $guarded = [];

    /**
     * Get user_type
     */
    public function gesture_type()
    {
        return $this->belongsTo(Gesture::class);
    }
}
