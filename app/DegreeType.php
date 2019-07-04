<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeType extends Model
{
    protected $connection = 'phschool';
    protected $table = 'degree_types';

    public function academicDegree() {
        return $this->belongsTo('App\AcademicDegree');
    }
}
