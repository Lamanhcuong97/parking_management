<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigManagementController extends Controller
{
    public function  configFee()
    {
        return view('configs.config-fee');
    }

    public function  configParking()
    {
        return view('configs.config-parking');
    }
}
