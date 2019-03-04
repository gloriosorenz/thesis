<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'users_id', 'delivered', 'total_price','order_statuses_id',
    ];

    public function order_products(){
        return $this->hasMany('App\Order_Product');
    }
}
