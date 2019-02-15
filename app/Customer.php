<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company', 'customer_types_id', 'users_id'
    ];


    
    public function customer_types()
    {
        return $this->belongsTo(CustomerType::class, 'customer_types_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
