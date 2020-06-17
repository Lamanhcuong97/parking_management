<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogLogIn extends Model
{
    protected $table = "log_log_in";
    public $timestamps = false;
    protected $guarded = []; 

    public function parking() {
        
        return $this->belongsTo('App\Parking', 'Parking_Area_ID', 'Parking_Area_ID');
    }

    public function user() {
        
        return $this->belongsTo('App\User', 'User_ID', 'User_ID');
    }
}
