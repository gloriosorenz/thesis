<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonList extends Model
{
    public function rice_farmers()
    {
        return $this->belongsTo(RiceFarmer::class, 'rice_farmers_id');
    }
}
