<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableCodes extends Model
{
    protected $connection = 'mysql';
    
    protected $table = '_table_codes';

    protected $fillable = [
        'identifier', 'year', 'series',
    ];
}
