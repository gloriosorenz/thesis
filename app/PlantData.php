<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantData extends Model
{
    protected $table = 'plant_datas'; 

    protected $fillable = [
        'plant_area', 'farmers', 'barangays_id',
    ];

    public function barangays()
    {
        return $this->belongsTo(Barangay::class, 'barangays_id');
    }
}
