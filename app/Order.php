<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'users_id', 'delivered', 'total_price',
    ];
}
