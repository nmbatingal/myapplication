<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Offices extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'offices';

    protected $fillable = [
        'div_name', 'acronym', 'div_head_id', 'position',
    ];

    public function hasHead()
    {
        return $this->belongsTo('App\User', 'div_head_id', 'id');
    }

    public function officeCount($id)
    {
        $userCount = User::where('div_unit', $id)->count();
        return $userCount;
    }

    public function scopeDivId($query, $office)
    {
        return $query->where('acronym', $office)
                     ->select('id');
    }
}
