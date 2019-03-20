<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $fillable = ['name', 'code'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
