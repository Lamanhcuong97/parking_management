<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatisticParking extends Model
{
    protected $table = "parking_tbl";
    public $timestamps = false;
    protected $guarded = []; 

    public function parking()
    {
        return $this->belongsTo('App\Parking', 'Parking_Area_ID',  'Parking_Area_ID');
    }

    public function vehicle_type()
    {
        return $this->belongsTo('App\VehicleType', 'Vehicle_ID', 'Type_Vehicle_ID');
    }
}
