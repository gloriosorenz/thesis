<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantReport extends Model
{
    protected $table = 'plant_reports'; 

    protected $fillable = [
        'plant_area', 'farmers',
    ];

    public function plant_datas()
    {
        return $this->hasMany('App\PlantData');
    }


}
