<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "user_mst";
    public $timestamps = false;
    protected $guarded = []; 

    public function role()
    {
        return $this->belongsTo('App\Role', 'Role_ID', 'Role_ID');
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'Com_ID', 'Com_ID');
    }

    public function log_logins()
    {
        return $this->hasMany('App\LogLogIn', 'User_ID', 'User_ID');
    }
}
