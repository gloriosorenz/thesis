<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProductStatus extends Model
{
    protected $fillable = [
        'status',
    ];

    // public function order_products()
    // {
    //     return $this->belongsTo(OrderProduct::class, 'order_product_statuses_id');
    // }

    public function order_products(){
        return $this->hasMany('App\OrderProduct');
    }
}
