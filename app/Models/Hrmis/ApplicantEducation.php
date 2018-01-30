<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class ApplicantEducation extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'applicant_educations';

    protected $fillable = [
        'program', 'acronym', 'school', 'year_graduated', 'applicant_id',
    ];

    public function hasApplicant()
    {
        return $this->belongsTo('App\Models\Hrmis\Applicants', 'applicant_id', 'id');
    }
}
