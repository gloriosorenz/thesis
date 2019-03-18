<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['code','name','regions_id','provinces_id'];

    public function users()
    {
        return $this->hasMany(User::class,'users_id');
    }
}
