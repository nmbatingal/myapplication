<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'lastname', 
        'firstname', 
        'middlename',
        'email', 
        'mobile_number', 
        'div_unit',
        'position',
        'password',
        '__isActive',
        '__isAdmin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function hasOffice()
    {
        return $this->belongsTo('App\Offices', 'div_unit', 'id');
    }

    public function scopeEmployee($query)
    {
        return $query->where('__isActive', 1)
                     ->where('__isAdmin', '!=', 1);
    }
}
