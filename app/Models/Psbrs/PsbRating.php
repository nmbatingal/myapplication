<?php

namespace App\Models\Psbrs;

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
}
