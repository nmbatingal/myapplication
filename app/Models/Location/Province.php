<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $connection = "phaddress";
    protected $primaryKey = "code";

    public function region() {
        return $this->belongsTo('App\Models\Location\Region');
    }
    public function municipalities() {
        return $this->hasMany('App\Models\Location\Municipality');
    }
}
