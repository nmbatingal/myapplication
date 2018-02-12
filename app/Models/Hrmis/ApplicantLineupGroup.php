<?php

namespace App\Models\Hrmis;

use App\Models\Psbrs\PsbRating;
use Illuminate\Database\Eloquent\Model;

class ApplicantLineupGroup extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'applicant_lineup_groups';

    protected $fillable = [
        'lineup_id', 'applicant_id', 'remarks',
    ];

    public function psbMemberRating( $id, $psb_id )
    {
        $q = PsbRating::where( 'lineup_applicant_id', $id )
                      ->where( 'psb_id', $psb_id)
                      ->first();

        $array = [ $q['rate_education'], $q['rate_training'], $q['rate_experience'], $q['rate_character'], $q['rate_comm_skills'], 
                   $q['rate_special_skills'], $q['rate_special_award'], $q['rate_potential'] ];

        $average = array_sum($array); // count($array);

        return $average;
    }

    public function totalRating()
    {

    }

    public function hasLineup()
    {
        return $this->belongsTo('App\Models\Hrmis\ApplicantLineup', 'lineup_id', 'id');
    }

    public function hasApplicant()
    {
        return $this->belongsTo('App\Models\Hrmis\Applicants', 'applicant_id', 'id');
    }
}
