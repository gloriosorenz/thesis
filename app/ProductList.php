<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    protected $fillable = [
        'products_id', 'seasons_id', 'rice_farmers_id', 'orig_quantity','price', 'orig_quantity'
    ];

    public function presentPrice()
    {
        return money_format('$%i',$this->price);
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function season_lists()
    {
        return $this->belongsTo(SeasonList::class, 'season_lists_id');
    }
}

