<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicDegree extends Model
{
    protected $connection = 'phschool';
    protected $table = 'academic_degrees';

    public function degreeTypes() {
        return $this->hasMany('App\DegreeType', 'academic_degree_id');
    }
}
