<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seed extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'active'
    ];

    // public function users()
    // {
    //     return $this->belongsTo(RiceFarmer::class, 'users_id');
    // }
}
