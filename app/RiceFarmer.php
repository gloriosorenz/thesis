<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiceFarmer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company', 'no_farmers', 'hectares', 'planned_crops_id', 'users_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function barangays()
    {
        return $this->belongsTo(Barangay::class, 'barangays_id');
    }
   
    public function products(){
        return $this->hasMany('App\ProductList');
    }
}
