<?php

namespace App\Models\Morale;

use Illuminate\Database\Eloquent\Model;

class MoraleSurveySemestral extends Model
{
    protected $connection = 'mysql';

    protected $table = 'morale_survey_semestrals';

    protected $fillable = [
        'month_from',
        'month_to',
        'year',
    ];

    public function from()
    {
        return $this->belongsTo('App\Month', 'month_from', 'id');
    }

    public function to()
    {
        return $this->belongsTo('App\Month', 'month_to', 'id');
    }
}
