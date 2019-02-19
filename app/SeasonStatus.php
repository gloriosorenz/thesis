<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonStatus extends Model
{
    protected $fillable = [
        'status'
    ];

    // public function users()
    // {
    //     return $this->belongsTo(Season::class, 'seasons_id');
    // }
}
