<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';

    protected $fillable = ['orders_id', 'product_lists_id', 'quantity'];


    public function orders()
    {
        return $this->belongsTo(Order::class, 'orders_id');
    }

    public function product_lists()
    {
        return $this->belongsTo(ProductList::class, 'product_lists_id');
    }
}
