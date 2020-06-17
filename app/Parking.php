<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $table = "parking_area_mst";
    public $timestamps = false;
    protected $guarded = []; 

    public function company() {
        
        return $this->belongsTo('App\Company', 'Com_ID', 'Com_ID');
    }

    public function parking_fees()
    {
        return $this->hasMany('App\ParkingFee', 'Parking_Area_ID', 'Parking_Area_ID');
    }

    public function statistic_parkings()
    {
        return $this->hasMany('App\StatisticParking', 'Parking_Area_ID', 'Parking_Area_ID');
    }

    public function log_logins()
    {
        return $this->hasMany('App\LogLogIn', 'Parking_Area_ID', 'Parking_Area_ID');
    }
}
