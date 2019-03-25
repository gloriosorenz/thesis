<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageData extends Model
{
    protected $table = 'damage_datas';

    protected $fillable = [
        'crop', 'crop_stage', 'production', 'animal','animal_head', 'fish', 'area', 'fish_pieces','damage_reports_id'
    ];

    public function damage_reports()
    {
        return $this->belongsTo(DamageReport::class, 'damage_reports_id');
    }
}
