<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonList extends Model
{
    protected $fillable = [
        'id','users_id', 'seasons_id', 'planned_hectares', 'actual_hectares', 'planned_num_farmers','actual_num_farmers','planned_qty','actual_qty','seasons_list_statuses_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function seasons()
    {
        return $this->belongsTo(Season::class, 'seasons_id');
    }

    public function season_list_statuses()
    {
        return $this->belongsTo(SeasonListStatus::class, 'season_list_statuses_id');
    }
}
