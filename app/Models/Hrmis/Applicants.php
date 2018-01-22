<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'applicants';

    protected $fillable = [
        'lastname', 'firstname', 'middlename', 
        'contact_number', 'email', 'age', 
        'remarks', 'status', 'added_by',  
    ];

    public function educations()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantEducation', 'applicant_id');
    }

    public function trainings()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantTraining', 'applicant_id');
    }

    public function experiences()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantExperience', 'applicant_id');
    }

    public function eligibilities()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantEligibility', 'applicant_id');
    }

    public function attachments()
    {
        return $this->hasMany('App\Models\Hrmis\ApplicantAttachment', 'applicant_id');
    }
}
