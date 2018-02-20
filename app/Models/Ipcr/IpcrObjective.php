<?php

namespace App\Models\Ipcr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IpcrObjective extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $connection = 'mysql';

    protected $table = 'ipcrs_objective';

    protected $fillable = [
        'ipcr_id',
        'is_title',
        'objective',
        'key_summary',
        'target',
        'parent',
    ];

    public function ipcr()
    {
        return $this->belongsTo('App\Models\Ipcr\Ipcr', 'ipcr_id', 'id');
    }
}
