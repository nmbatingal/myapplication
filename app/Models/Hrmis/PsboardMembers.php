<?php

namespace App\Models\Hrmis;

use Illuminate\Database\Eloquent\Model;

class PsboardMembers extends Model
{
	protected $connection = 'mysql';
    
    protected $table = 'psboard_members';

    protected $fillable = [
        'user_id', 'designation', 'acronym',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
