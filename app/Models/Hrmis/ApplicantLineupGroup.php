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

    /*** FORMULA ***/

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

    public function totalAveRating( $id )
    {
        $q = PsbRating::where( 'lineup_applicant_id', $id )->get();

        if ( count($q) > 0 )
        {
            $sum = 0;
            foreach ( $q as $value ) {

                $sum += $value['rate_education'];
                $sum += $value['rate_training'];
                $sum += $value['rate_experience'];
                $sum += $value['rate_character'];
                $sum += $value['rate_comm_skills'];
                $sum += $value['rate_special_skills'];
                $sum += $value['rate_special_award'];
                $sum += $value['rate_potential'];
            }

            $average = $sum / count($q);

            return $average;
        }

        return 0;
    }
}
