<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'code'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
