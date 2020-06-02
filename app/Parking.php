<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $table = "parking_area_mst";
    public $timestamps = false;

    public function company() {
        
        return $this->belongsTo('App\Company', 'Com_ID', 'Com_ID');
    }
}
