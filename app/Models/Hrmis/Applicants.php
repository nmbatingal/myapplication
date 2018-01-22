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
        return $this->hasMany('App\Models\Hrmis\ApplicantsEducation', 'applicant_id');
    }
}
