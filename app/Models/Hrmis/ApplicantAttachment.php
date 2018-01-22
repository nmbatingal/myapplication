<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class ApplicantAttachment extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'applicant_attachments';

    protected $fillable = [
        'filename', 'path', 'applicant_id',
    ];

    public function hasApplicant()
    {
        return $this->belongsTo('App\Models\Hrmis\Applicants', 'applicant_id', 'id');
    }
}
