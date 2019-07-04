<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $connection = "phaddress";
    protected $primaryKey = "code";

    public function province() {
        return $this->belongsTo('App\Models\Location\Province');
    }
    public function barangays() {
        return $this->hasMany('App\Models\Location\Barangay');
    }
}
