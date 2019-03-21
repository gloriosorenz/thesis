<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantData extends Model
{
    protected $table = 'plant_datas'; 

    protected $fillable = [
        'plant_area', 'farmers', 'users_id', 'plant_reports_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function plant_reports()
    {
        return $this->belongsTo(PlantReport::class, 'plant_reports_id');
    }
    
}
