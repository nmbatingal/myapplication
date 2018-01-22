<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class ApplicantEligibility extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'applicant_eligibilities';

    protected $fillable = [
        'license_number', 'title', 'rating',  
        'exam_date', 'applicant_id',  
    ];

    public function hasApplicant()
    {
        return $this->belongsTo('App\Models\Hrmis\Applicants', 'applicant_id', 'id');
    }
}
