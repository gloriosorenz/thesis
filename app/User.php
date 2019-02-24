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
        'first_name', 'last_name', 'email', 'phone', 'address', 'password', 'roles_id', 'active', 'isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    public function barangayS()
    {
        return $this->belongsTo(Barangay::class, 'barangays_id');
    }

    public function rice_farmers()
    {
        return $this->hasMany('App\RiceFarmer');
    }
    
    public function products(){
        return $this->hasMany('App\ProductList');
    }
}
