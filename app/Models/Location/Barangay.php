<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $connection = "phaddress";
    protected $primaryKey = "code";

    public function municipality() {
        return $this->belongsTo('App\Models\Location\Municipality');
    }
}
