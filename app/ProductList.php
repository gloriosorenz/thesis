<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    protected $fillable = [
        'products_id', 'seasons_id', 'users_id', 'orig_quantity','price', 'orig_quantity'
    ];

    public function presentPrice()
    {
        return '₱'.number_format($this->price / 100 * 100, 2);
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function seasons()
    {
        return $this->belongsTo(Season::class, 'seasons_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}

