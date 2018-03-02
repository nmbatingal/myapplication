<?php

namespace App\Models\Morale;

use Illuminate\Database\Eloquent\Model;

class MoraleSurveyNotification extends Model
{
    protected $connection = 'mysql';

    protected $table = 'morale_survey_notifications';

    protected $fillable = [
        'sem_id',
        'user_id',
        'div_id',
    ];

    public function semester()
    {
        return $this->belongsTo('App\Models\Morale\MoraleSurveySemestral', 'sem_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function office()
    {
        return $this->belongsTo('App\Offices', 'div_id', 'id');
    }

    public function scopeIsDone($query, $sem, $user)
    {
    	return $query->where('sem_id', $sem)
    				 ->where('user_id', $user);
    }
}
