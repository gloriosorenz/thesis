<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageReport extends Model
{
    protected $table = 'damage_reports'; 

    protected $fillable = [
        'calamities_id', 'narrative', 'crop', 'crop_stage', 'production', 'animal', 'animal_head', 'fish', 'area', 'fish_pieces', 'regions_id', 'provinces_id'
    ];

    public function calamities()
    {
        return $this->belongsTo(Calamity::class, 'calamities_id');
    }

    public function regions()
    {
        return $this->belongsTo(Region::class, 'regions_id');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }
}
