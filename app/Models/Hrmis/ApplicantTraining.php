<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class ApplicantTraining extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'applicant_trainings';

    protected $fillable = [
        'title', 'conducted_by', 'hours',
        'from_date', 'to_date', 'applicant_id',
    ];

    public function hasApplicant()
    {
        return $this->belongsTo('App\Models\Hrmis\Applicants', 'applicant_id', 'id');
    }
}
