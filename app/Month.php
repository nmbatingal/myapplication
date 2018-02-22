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

    public function scopeMonth($query, $id)
    {
        return $query->where('id', $id);
    }
}
