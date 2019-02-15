<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    // protected $fillable = [
    //     'company', 'no_farmers', 'hectares', 'planned_crops_id', 'users_id'
    // ];

    public function users()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function products()
    {
        return $this->belongsTo(ProductList::class, 'productlists_id');
    }

    public function season_types()
    {
        return $this->belongsTo(SeasonType::class, 'season_types_id');
    }
}
