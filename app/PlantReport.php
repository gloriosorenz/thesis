<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantReport extends Model
{
    protected $table = 'plant_reports'; 

    protected $fillable = [
        'plant_area', 'farmers', 'barangays_id',
    ];

    public function barangays()
    {
        return $this->belongsTo(Calamity::class, 'barangays_id');
    }
}
