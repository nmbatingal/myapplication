<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    protected $connection = 'mysql';
    protected $table = 'applicants';
    protected $fillable = [
        'lastname', 'firstname', 'middlename',
        'contact_number', 'email', 'age', 'sex', 'civil_status',
        'date_of_application',
        'date_received',
        'remarks', 'status', 'added_by',  
    ];

    public function educations()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantEducation', 'applicant_id', 'id');
    }

    public function trainings()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantTraining', 'applicant_id', 'id');
    }

    public function experiences()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantExperience', 'applicant_id', 'id');
    }

    public function eligibilities()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantEligibility', 'applicant_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantAttachment', 'applicant_id', 'id');
    }
    
    public function selectionLists()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantLineupGroup', 'applicant_id', 'id');
    }
}
