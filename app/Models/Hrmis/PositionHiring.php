<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class PositionHiring extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'position_hirings';

    protected $fillable = [
        'title', 'acronym', 'sal_grade', 'item_no',
        'publication_no', 'education_reqs', 'experience_reqs', 'training_reqs',
        'eligibilities',
    ];
}
