<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $connection = 'mysql';

    protected $table = 'table_month';

    protected $fillable = [
        'month',
        'acronym',
    ];
}
