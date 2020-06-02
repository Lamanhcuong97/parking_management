<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function statisticVehicle()
    {
        return view('statistics.statistic-vehicle');
    }

    public function statisticLogin()
    {
        return view('statistics.statistic-login');
    }

    public function statisticRevenue()
    {
        return view('statistics.statistic-revenue');
    }

    public function searchVehicle()
    {
        return view('statistics.seacrh-vehicle');
    }
}
