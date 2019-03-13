<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'password', 'roles_id', 'active', 'isAdmin', 'barangays_id', 'cities_id', 'provinces_id', 'street'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function setpasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value ?: str_random(10));
    // }
    
    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    public function barangays()
    {
        return $this->belongsTo(Barangay::class, 'barangays_id');
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'cities_id');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    public function rice_farmers()
    {
        return $this->hasMany('App\RiceFarmer');
    }
    
    public function products(){
        return $this->hasMany('App\ProductList');
    }
}
