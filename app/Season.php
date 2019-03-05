<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = [
        'season_start', 'season_end', 'season_types_id', 'seasons_statuses_id'
    ];

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

    public function season_statuses()
    {
        return $this->belongsTo(SeasonStatus::class, 'season_statuses_id');
    }
}
