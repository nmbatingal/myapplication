<?php

namespace App\Models\Ipcr;

use Illuminate\Database\Eloquent\Model;

class IpcrsMonthlyTarget extends Model
{
    protected $connection = 'mysql';

    protected $table = 'ipcrs_monthly_target';

    protected $fillable = [
        'obj_id',
        'month_id',
        'target',
        'value',
    ];

    public function objective()
    {
        return $this->belongsTo('App\Models\Ipcr\IpcrObjective', 'obj_id', 'id');
    }

    public function month()
    {
        return $this->belongsTo('App\Month', 'month_id', 'id');
    }
}
