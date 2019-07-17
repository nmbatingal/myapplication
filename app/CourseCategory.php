<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $connection = 'phschool';
    protected $table = 'course_categories';
}
