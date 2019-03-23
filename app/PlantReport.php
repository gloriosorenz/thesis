<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantReport extends Model
{
    protected $table = 'plant_reports'; 

    protected $fillable = [
        'seasons_id', 'active',
    ];

    public function plant_datas()
    {
        return $this->hasMany('App\PlantData');
    }

    public function seasons()
    {
        return $this->belongsTo(Season::class, 'seasons_id');
    }

}
