<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = "type_vehicle_mst";
    public $timestamps = false;
    protected $guarded = []; 

    public function parking()
    {
        return $this->hasMany('App\ParkingFee', 'Vehicle_ID',  'Type_Vehicle_ID');
    }

    public function vehicles()
    {
        return $this->hasMany('App\StatisticParking', 'Vehicle_ID',  'Type_Vehicle_ID');
    }

}
