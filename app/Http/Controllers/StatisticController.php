<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use DB;
use App\ParkingFee;
use App\LogLogIn;
use App\Company;
use App\StatisticParking;
use App\VehicleType;
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
        ->groupBy('parking_tbl.Parking_Area_ID');

        $company_id = $request->search_company_id;
        if( !is_null($company_id)){
            $data = $data->whereExists(function ($query) use ($company_id) {
                 $query->select(DB::raw(1))
                     ->from('parking_area_mst')
                     ->where('Com_ID', $company_id);
             });
         }  

        $data = $data->get()->toArray();

        $i = 0;
        foreach( $data as $item){
            $statistics = DB::table('parking_tbl')
            ->select('parking_tbl.Vehicle_ID', 'type_vehicle_mst.Type_Vehicle_Name', DB::raw('count(*) as total'))
            ->where('Parking_Area_ID', $item->Parking_Area_ID)
            ->whereBetween('parking_tbl.Mod_Date', [$from, $to])
            ->join('type_vehicle_mst', 'parking_tbl.Vehicle_ID', '=', 'type_vehicle_mst.Type_Vehicle_ID')
            ->groupBy('parking_tbl.Vehicle_ID');

            if( !is_null($company_id)){
                $statistics = $statistics->whereExists(function ($query) use ($company_id) {
                    $query->select(DB::raw(1))
                        ->from('parking_area_mst')
                        ->where('Com_ID', $company_id);
                });
            } 

            $statistics = $statistics->get();

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

            $log_logins = LogLogIn::select("*")->whereBetween('Time_In', [$from, $to]);

            if( !is_null($request->status)){
                $log_logins = $log_logins->Where('Parking_Status', $request->status);
            }

            if( !is_null($request->search_company_id)){
                $company_id = $request->search_company_id;
                $log_logins = $log_logins->whereHas('parking', function ($query) use ($company_id) {
                    $query->where('Com_ID', $company_id);
                });
            }

            if( !is_null($request->search_parking_name)){
                $search_parking_name = $request->search_parking_name;
                $log_logins = $log_logins->whereHas('parking', function ($query) use ($search_parking_name) {
                    $query->where('Parking_Area_Name', $search_parking_name);
                });
            }

            if( !is_null($request->company_email)){
                $log_logins = $log_logins->Where('Com_Email', $request->company_email);
            }

            $log_logins = $log_logins->with(['user', 'parking'])->get();
        }else{
            $log_logins = LogLogIn::with(['user', 'parking'])->get();
        }
        
        return view('statistics.statistic-login', ['log_logins' => $log_logins]);
    }



    public function statisticRevenue(Request $request)
    {
        $companies = Company::all();
        $request->flash();
        $from = !is_null($request->search_time_start) ? (new Carbon($request->search_time_start))->toDateString() . ' 00:00:00' : Carbon::now()->subDays(Carbon::now()->day - 1)->toDateString() . ' 00:00:00';
        $to = !is_null($request->search_time_start) ? (new Carbon($request->search_time_end))->toDateString() . ' 23:59:59' : Carbon::now()->toDateString() . ' 23:59:59';
        $data = DB::table('parking_tbl')
        ->select('parking_area_mst.Parking_Area_Name', 'parking_area_mst.Parking_Area_ID' , DB::raw('SUM(parking_tbl.Cost_Parking) as revenue'))
        ->join('parking_area_mst', 'parking_tbl.Parking_Area_ID', '=', 'parking_area_mst.Parking_Area_ID')
        ->whereBetween('parking_tbl.Mod_Date', [$from, $to])
        ->groupBy('parking_tbl.Parking_Area_ID');

        $company_id = $request->search_company_id;
        if( !is_null($company_id)){
            $data = $data->whereExists(function ($query) use ($company_id) {
                 $query->select(DB::raw(1))
                     ->from('parking_area_mst')
                     ->where('Com_ID', $company_id);
             });
         }  
        
        $data = $data->get()->toArray();
        

        $i = 0;
        foreach( $data as $item){
            $statistics = DB::table('parking_tbl')
            ->select('parking_tbl.Vehicle_ID', 'type_vehicle_mst.Type_Vehicle_Name', DB::raw('SUM(parking_tbl.Cost_Parking) as revenue'))
            ->where('Parking_Area_ID', $item->Parking_Area_ID)
            ->whereBetween('parking_tbl.Mod_Date', [$from, $to])
            ->join('type_vehicle_mst', 'parking_tbl.Vehicle_ID', '=', 'type_vehicle_mst.Type_Vehicle_ID')
            ->groupBy('parking_tbl.Vehicle_ID');

            if( !is_null($request->search_company_id)){
                $statistics = $statistics->whereExists(function ($query) use ($company_id) {
                     $query->select(DB::raw(1))
                         ->from('parking_area_mst')
                         ->where('Com_ID', $company_id);
                 });
             }  

            $statistics = $statistics->get();

            $data[$i]->statistics = $statistics;
            $i++;
        }

       

        return view('statistics.statistic-revenue', ['data' => $data, 'companies' => $companies]);
    }

    public function searchVehicle(Request $request)
    {
        $companies = Company::all();
        $vehicle_types = VehicleType::all();

        $from = !is_null($request->search_time_start) ? (new Carbon($request->search_time_start))->toDateString() . ' 00:00:00' : Carbon::now()->subDays(Carbon::now()->day - 1)->toDateString() . ' 00:00:00';
        $to = !is_null($request->search_time_start) ? (new Carbon($request->search_time_end))->toDateString() . ' 23:59:59' : Carbon::now()->toDateString() . ' 23:59:59';
        $search = $request->all();
        $request->flash();

        if(!empty($search)){

            $vehicles = StatisticParking::select("*")->whereBetween('Time_In', [$from, $to]);

            if( !is_null($request->search_vehicle_status)){
                $vehicles = $vehicles->Where('Parking_Status', $request->search_vehicle_status);
            }

            if( !is_null($request->search_vehicle_type)){
                $vehicles = $vehicles->Where('Vehicle_ID', $request->search_vehicle_type);
            }

            if( !is_null($request->search_vehicle_lp)){
                $vehicles = $vehicles->Where('License_Plates', $request->search_vehicle_lp);
            }

            if( !is_null($request->search_company_id)){
                $company_id = $request->search_company_id;
                $vehicles = $vehicles->whereHas('parking', function ($query) use ($company_id) {
                    $query->where('Com_ID', $company_id);
                });
            }   

            $vehicles = $vehicles->with(['vehicle_type', 'parking'])->get();
        }else{
            $vehicles = StatisticParking::with(['vehicle_type', 'parking'])->get();
        }

        return view('statistics.search-vehicle', ['vehicles' => $vehicles, 'companies' => $companies, 'vehicle_types' => $vehicle_types]);
    }

    public function detailVehicle($id){
        $vehicle = StatisticParking::with(['vehicle_type', 'parking'])->where('Parking_ID', $id)->first();

        return view('statistics.detail-vehicle', ['vehicle' => $vehicle]);
    }

}
