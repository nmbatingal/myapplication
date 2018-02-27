<?php

namespace App\Models\Morale;

use Illuminate\Database\Eloquent\Model;

class MoraleSurveyQuestions extends Model
{
    protected $connection = 'mysql';

    protected $table = 'morale_survey_questions';

    protected $fillable = [
        'text_question',
    ];
}
