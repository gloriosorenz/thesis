<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonList extends Model
{
    protected $fillable = [
        'actual_hectares', 'actual_num_farmers', 'actual_qty', 'seasons_id', 'rice_farmers_id'
    ];

    public function rice_farmers()
    {
        return $this->belongsTo(RiceFarmer::class, 'rice_farmers_id');
    }

    public function seasons()
    {
        return $this->belongsTo(Season::class, 'seasons_id');
    }
}
