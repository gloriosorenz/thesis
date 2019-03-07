<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageList extends Model
{
    protected $table = 'damage_lists';

    protected $fillable = [
        'crop', 'crop_stage', 'production', 'animal','animal_head', 'fish', 'area', 'fish_pieces'
    ];

    public function damage_reports()
    {
        return $this->belongsTo(DamageReport::class, 'damage_reports_id');
    }
}
