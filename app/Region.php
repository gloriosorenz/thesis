<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
