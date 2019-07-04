<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $connection = "phaddress";
    protected $primaryKey = "code";

    public function provinces() {
        return $this->hasMany('App\Models\Location\Province');
    }
}
