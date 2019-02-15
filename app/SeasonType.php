<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonType extends Model
{
    protected $fillable = [
        'type'
    ];

    public function users()
    {
        return $this->belongsTo(Season::class, 'seasons_id');
    }
}
