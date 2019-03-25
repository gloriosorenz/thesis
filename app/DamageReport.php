<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageReport extends Model
{
    protected $table = 'damage_reports'; 

    protected $fillable = [
        'id','calamities_id', 'narrative', 'regions_id', 'provinces_id'
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
