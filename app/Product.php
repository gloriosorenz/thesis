<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'total_quantity', 'seasons_id', 'rice_farmers_id',
    ];

    public function productlists()
    {
        return $this->belongsTo(ProductList::class, 'productlists_id');
    }
}
