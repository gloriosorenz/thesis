<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';

    protected $fillable = ['orders_id', 'product_lists_id', 'quantity'];
}
