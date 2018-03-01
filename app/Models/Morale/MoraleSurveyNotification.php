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
    ];

    public function scopeIsDone($query, $sem, $user)
    {
    	return $query->where('sem_id', $sem)
    				 ->where('user_id', $user);
    }
}
