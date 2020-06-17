<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigParking extends Model
{
    protected $table = "set_parking_tbl";
    public $timestamps = false;
    protected $guarded = []; 

    public function parking()
    {
        return $this->hasOne('App\Parking', 'Parking_Area_ID',  'Parking_Area_ID');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'User_ID',  'User_ID');
    }
}
