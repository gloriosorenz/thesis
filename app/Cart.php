<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product_lists()
    {
        return $this->belongsTo(ProductList::class, 'product_lists_id');
    }
}
