<?php

namespace App\Models\Morale;

use Illuminate\Database\Eloquent\Model;

class MoraleSurvey extends Model
{
	protected $connection = 'mysql';

    protected $table = 'morale_survey_ratings';

    protected $fillable = [
        'user_id',
        'question_id',
        'score',
    ];
}
