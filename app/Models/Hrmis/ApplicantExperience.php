<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class ApplicantExperience extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'applicant_experiences';

    protected $fillable = [
        'position', 'agency', 'salary_grade',  
        'from_date', 'to_date', 'applicant_id',  
    ];

    public function hasApplicant()
    {
        return $this->belongsTo('App\Models\Hrmis\Applicants', 'applicant_id', 'id');
    }
}
