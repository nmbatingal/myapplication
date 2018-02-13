<?php

namespace App\Models\Psbrs;

use App\Models\Hrmis\PsboardMembers;
use Illuminate\Database\Eloquent\Model;

class PsbRating extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'psb_ratings';

    protected $fillable = [
        'lineup_applicant_id', 
        'psb_id', 
        'rate_education', 
        'rate_training', 
        'rate_experience', 
        'rate_character',
        'rate_comm_skills', 
        'rate_special_skills', 
        'rate_special_award',
        'rate_potential', 
        'remarks',
    ];

    public function scopePsbMember($query, $user)
    {
        $psb = PsboardMembers::where('user_id', $user)->first();
        return $query->where('psb_id', $psb['id']);
    }

    public function hasPsbMember()
    {
        // return $this->belongsTo('App\Models\Hrmis\PsboardMembers', 'psb_id', 'id');
        return $this->belongsTo('App\User', 'psb_id', 'id');
    }

    public function hasLineup()
    {
        return $this->belongsTo('App\Models\Hrmis\ApplicantLineupGroup', 'lineup_applicant_id', 'id');
    }

    public function averageRating()
    {
        $array = [  
                    $this['rate_education'], 
                    $this['rate_training'], 
                    $this['rate_experience'], 
                    $this['rate_character'], 
                    $this['rate_comm_skills'], 
                    $this['rate_special_skills'], 
                    $this['rate_special_award'], 
                    $this['rate_potential'],
                ];

        // $average = ( array_sum($array) / count($array) ) * 100;
        $average = array_sum($array);

        return $average;
    }

    public function totalAveRating( $id )
    {
        $q = $this::where( 'lineup_applicant_id', $id )->get();

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
