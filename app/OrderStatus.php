<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = [
        'status',
    ];

    public function season_types()
    {
        return $this->belongsTo(Order::class, 'order_statuses_id');
    }
}
