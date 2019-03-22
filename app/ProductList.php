<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    protected $fillable = [
        'curr_products_id', 'orig_products_id', 'seasons_id', 'users_id', 'orig_quantity','price', 'curr_quantity'
    ];


    public function totalVisits()
    {
        return DB::table('product_lists')
                        ->where('products_id', '=', $this->id)
                        ->sum('curr_quantity');
    }

    public function presentPrice()
    {
        return '₱'.number_format($this->price / 100 * 100, 2);
    }

    public function orig_products()
    {
        return $this->belongsTo(Product::class, 'orig_products_id');
    }

    public function curr_products()
    {
        return $this->belongsTo(Product::class, 'curr_products_id');
    }

    public function seasons()
    {
        return $this->belongsTo(Season::class, 'seasons_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function getProd1($data){
        return $data->curr_quantity;
    }

}

