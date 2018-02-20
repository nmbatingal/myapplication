<?php

namespace App\Models\Ipcr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ipcr extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $connection = 'mysql';

    protected $table = 'ipcrs';

    protected $fillable = [
        'title',
        'year',
        'month_from',
        'month_to',
        'user_id',
        'office_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function office()
    {
        return $this->belongsTo('App\Offices', 'office_id', 'id');
    }
}
