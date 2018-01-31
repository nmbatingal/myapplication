<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class ApplicantLineupGroup extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'applicant_lineup_groups';

    protected $fillable = [
        'lineup_id', 'applicant_id', 'remarks',
    ];

    public function hasLineup()
    {
        return $this->belongsTo('App\Models\Hrmis\ApplicantLineup', 'lineup_id', 'id');
    }

    public function hasApplicant()
    {
        return $this->belongsTo('App\Models\Hrmis\Applicants', 'applicant_id', 'id');
    }
}
