<?php

namespace App\Models\Morale;

use App\Models\Morale\MoraleSurveyNotification as Notification;
use App\Models\Morale\MoraleSurveyQuestions as Questions;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MoraleSurveyRatings extends Model
{
    protected $connection = 'mysql';

    protected $table = 'morale_survey_ratings';

    protected $fillable = [
        'user_id',
        'question_id',
        'score',
        'semestral_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function question()
    {
        return $this->belongsTo('App\Models\Morale\MoraleSurveyQuestions', 'question_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo('App\Models\Morale\MoraleSurveySemestral', 'semestral_id', 'id');
    }

    public function scopeRatings($query, $sem, $user)
    {
        return $query->where('semestral_id', $sem)
                     ->where('user_id', $user)
                     ->orderBy('question_id', 'ASC');
    }

    public static function userOverallIndex($sem, $user)
    {
        $overall_index = 0;
        $query    = MoraleSurveyRatings::select(DB::raw(
                                'COUNT(case score when 2 then 1 else null end) AS \'no\',
                                COUNT(case score when 3 then 1 else null end) AS \'ns\',
                                COUNT(case score when 4 then 1 else null end) AS \'y\',
                                COUNT(case score when 5 then 1 else null end) AS \'dy\''
                            ))
                              ->where('semestral_id', $sem)
                              ->where('user_id', $user)
                              ->first();

        $question = Questions::count();
        $response = Notification::where('user_id', $user)->count();
            
        if ( $response ) 
        {
            // formula
            /*
                (( Nt + 2NSt + 3Yt + 4DYt ) / (( Qt x Rt ) * 4)) * 100
            */
            $overall_index = (( $query['no'] + ($query['ns'] * 2) + ($query['y'] * 3) + ($query['dy'] * 4) ) / (( $question * $response ) * 4) ) * 100;
        }

        return $overall_index;
    }

    public static function overallIndex($sem)
    {
        $overall_index = 0;
        $query    = MoraleSurveyRatings::select(DB::raw(
                                'COUNT(case score when 2 then 1 else null end) AS \'no\',
                                COUNT(case score when 3 then 1 else null end) AS \'ns\',
                                COUNT(case score when 4 then 1 else null end) AS \'y\',
                                COUNT(case score when 5 then 1 else null end) AS \'dy\''
                            ))
                              ->where('semestral_id', $sem)
                              ->first();
        $question = Questions::count();
        $response = Notification::where('sem_id', $sem)->count();
            
        if ( $response ) 
        {
            // formula
            /*
                (( Nt + 2NSt + 3Yt + 4DYt ) / (( Qt x Rt ) * 4)) * 100
            */
            $overall_index = (( $query['no'] + ($query['ns'] * 2) + ($query['y'] * 3) + ($query['dy'] * 4) ) / (( $question * $response ) * 4) ) * 100;
        }

        return $overall_index;
    }

}
