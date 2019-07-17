<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $connection = 'phschool';
    protected $fillable = [
        'degree_type_id',
        'course_category_id',
        'name'
    ];

    public function degreeType() {
        return $this->belongsTo('App\DegreeType', 'degree_type_id');
    }
    public function courseCategory() {
        return $this->belongsTo('App\CourseCategory', 'course_category_id');
    }
}
