<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use DB;
use App\ParkingFee;
use App\LogLogIn;
use App\Company;

class StatisticController extends Controller
{
    public function statisticVehicle(Request $request)
    {
        $request->flash();
        $companies = Company::all();
        $from = !is_null($request->search_time_start) ? (new Carbon($request->search_time_start))->toDateString() . ' 00:00:00' : Carbon::now()->subDays(Carbon::now()->day - 1)->toDateString() . ' 00:00:00';
        $to = !is_null($request->search_time_start) ? (new Carbon($request->search_time_end))->toDateString() . ' 23:59:59' : Carbon::now()->toDateString() . ' 23:59:59';

        $data = DB::table('parking_tbl')
        ->select('parking_area_mst.Parking_Area_Name', 'parking_area_mst.Parking_Area_ID' , DB::raw('count(*) as total'))
        ->join('parking_area_mst', 'parking_tbl.Parking_Area_ID', '=', 'parking_area_mst.Parking_Area_ID')
        ->whereBetween('parking_tbl.Mod_Date', [$from, $to])
        ->groupBy('parking_tbl.Parking_Area_ID')
        ->get()->toArray();

       $i = 0;
        foreach( $data as $item){
            $statistics = DB::table('parking_tbl')
            ->select('parking_tbl.Vehicle_ID', 'type_vehicle_mst.Type_Vehicle_Name', DB::raw('count(*) as total'))
            ->where('Parking_Area_ID', $item->Parking_Area_ID)
            ->whereBetween('parking_tbl.Mod_Date', [$from, $to])
            ->join('type_vehicle_mst', 'parking_tbl.Vehicle_ID', '=', 'type_vehicle_mst.Type_Vehicle_ID')
            ->groupBy('parking_tbl.Vehicle_ID')
            ->get();

            $data[$i]->statistics = $statistics;
            $i++;
        }

        return view('statistics.statistic-vehicle', ['data' => $data, 'companies' => $companies]);
    }

    public function statisticLogin(Request $request)
    {
        $from = !is_null($request->search_time_start) ? (new Carbon($request->search_time_start))->toDateString() . ' 00:00:00' : Carbon::now()->subDays(Carbon::now()->day - 1)->toDateString() . ' 00:00:00';
        $to = !is_null($request->search_time_start) ? (new Carbon($request->search_time_end))->toDateString() . ' 23:59:59' : Carbon::now()->toDateString() . ' 23:59:59';
        $search = $request->all();
        $request->flash();

        if(!empty($search)){

            $companies = LogLogIn::select("*")->whereBetween('Time_In', [$from, $to]);

            if( !is_null($request->status)){
                $companies = $companies->Where('Parking_Status', $request->status);
            }

            if( !is_null($request->company_phone)){
                $companies = $companies->Where('Com_Phone', $request->company_phone);
            }

            if( !is_null($request->company_email)){
                $companies = $companies->Where('Com_Email', $request->company_email);
            }

            $log_logins = $companies->with(['user', 'parking'])->get();
        }else{
            $log_logins = LogLogIn::with(['user', 'parking'])->get();
        }
        
        return view('statistics.statistic-login', ['log_logins' => $log_logins]);
    }

    public function detailVehicle($id){

        return view('statistics.detail-vehicle');
    }

    public function statisticRevenue(Request $request)
    {
        $request->flash();
        $from = !is_null($request->search_time_start) ? (new Carbon($request->search_time_start))->toDateString() . ' 00:00:00' : Carbon::now()->subDays(Carbon::now()->day - 1)->toDateString() . ' 00:00:00';
        $to = !is_null($request->search_time_start) ? (new Carbon($request->search_time_end))->toDateString() . ' 23:59:59' : Carbon::now()->toDateString() . ' 23:59:59';
        $data = DB::table('parking_tbl')
        ->select('parking_area_mst.Parking_Area_Name', 'parking_area_mst.Parking_Area_ID' , DB::raw('SUM(parking_tbl.Cost_Parking) as revenue'))
        ->join('parking_area_mst', 'parking_tbl.Parking_Area_ID', '=', 'parking_area_mst.Parking_Area_ID')
        ->whereBetween('parking_tbl.Mod_Date', [$from, $to])
        ->groupBy('parking_tbl.Parking_Area_ID')
        ->get()->toArray();

       $i = 0;
        foreach( $data as $item){
            $statistics = DB::table('parking_tbl')
            ->select('parking_tbl.Vehicle_ID', 'type_vehicle_mst.Type_Vehicle_Name', DB::raw('SUM(parking_tbl.Cost_Parking) as revenue'))
            ->where('Parking_Area_ID', $item->Parking_Area_ID)
            ->whereBetween('parking_tbl.Mod_Date', [$from, $to])
            ->join('type_vehicle_mst', 'parking_tbl.Vehicle_ID', '=', 'type_vehicle_mst.Type_Vehicle_ID')
            ->groupBy('parking_tbl.Vehicle_ID')
            ->get();

            $data[$i]->statistics = $statistics;
            $i++;
        }

        return view('statistics.statistic-revenue', ['data' => $data]);
    }

    public function searchVehicle()
    {
        return view('statistics.search-vehicle');
    }
}
