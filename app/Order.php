<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'users_id', 'total_price','order_statuses_id', 'tracking_id',
    ];

    public function order_products(){
        return $this->hasMany('App\OrderProduct');
    }

    public function order_statuses()
    {
        return $this->belongsTo(OrderStatus::class, 'order_statuses_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
