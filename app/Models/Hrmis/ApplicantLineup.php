<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class ApplicantLineup extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'applicant_lineups';

    protected $fillable = [
        'position_id', 'date_interview', 'status', 'remarks',
    ];

    public function hasPosition()
    {
        return $this->belongsTo('App\Models\Hrmis\PositionHiring', 'position_id', 'id');
    }

    public function hasGroups()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantLineupGroup', 'lineup_id');
    }
}
