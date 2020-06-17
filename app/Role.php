<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table  = "role_mst";
    public $timestamps = false;
    protected $guarded = []; 

    public function user()
    {
        return $this->hasMany('App\User', 'Role_ID', 'Role_ID');
    }
}
