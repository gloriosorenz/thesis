<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlannedCrop extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'quantity', 'active', 'seeds_id'
    ];

    // public function users()
    // {
    //     return $this->belongsTo(RiceFarmer::class, 'users_id');
    // }
}
