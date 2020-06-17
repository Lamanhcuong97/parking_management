<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table  = "com_mst";
    public $timestamps = false;
    protected $guarded = []; 

    public function parkings () 
    {
        return $this->hasMany('App\Parking', 'Com_ID', 'Com_ID');
    }

    public function users () 
    {
        return $this->hasMany('App\User', 'Com_ID', 'Com_ID');
    }
}
