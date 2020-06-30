<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use \Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $from = !is_null($request->search_time_start) 
            ? (new Carbon($request->search_time_start))->toDateString() . ' 00:00:00' 
            : Carbon::now()->subDays(Carbon::now()->day - 1)->toDateString() . ' 00:00:00';
        $to = !is_null($request->search_time_start) 
            ? (new Carbon($request->search_time_end))->toDateString() . ' 23:59:59' 
            : Carbon::now()->toDateString() . ' 23:59:59';

        $now = Carbon::now()->month . "-" .Carbon::now()->year;

        $user = Session::get('user');
        $company_id = $user->Com_ID;

        $data = DB::table('parking_tbl')
        ->select('Vehicle_ID' , DB::raw('count(*) as total'))
        ->whereBetween('Mod_Date', [$from, $to])
        ->whereExists(function ($query) use ($company_id) {
            $query->select(DB::raw(1))
                ->from('parking_area_mst')
                ->where('Com_ID', $company_id);
        })
        ->groupBy('Vehicle_ID')
        ->get()->toArray();

        $revenue = DB::table('parking_tbl')
        ->select(DB::raw('SUM(parking_tbl.Cost_Parking) as revenue'))
        ->whereExists(function ($query) use ($company_id) {
            $query->select(DB::raw(1))
                ->from('parking_area_mst')
                ->where('Com_ID', $company_id);
        })
        ->whereBetween('Mod_Date', [$from, $to])
        ->first()->revenue;

        return view('home', ['data' => $data, 'revenue' => $revenue, 'now' => $now]);
    }

    public function statisticOfDay(Request $request)
    {
        $user = Session::get('user');
        $company_id = $user->Com_ID;

        $data = DB::table('parking_tbl')
        ->select('Vehicle_ID' , DB::raw('count(*) as total'))
        ->whereDate('Mod_Date', $request->day)
        ->whereExists(function ($query) use ($company_id) {
            $query->select(DB::raw(1))
                ->from('parking_area_mst')
                ->where('Com_ID', $company_id);
        })
        ->groupBy('Vehicle_ID')
        ->get()->toArray();

        $revenue = DB::table('parking_tbl')
        ->select(DB::raw('SUM(parking_tbl.Cost_Parking) as revenue'))
        ->whereDate('Mod_Date', $request->day)
        ->whereExists(function ($query) use ($company_id) {
            $query->select(DB::raw(1))
                ->from('parking_area_mst')
                ->where('Com_ID', $company_id);
        })
        ->first()->revenue;

        if(count($data) == 0){
            return response()->json([
                'isEmpty' => true,
                'message' => 'Không có dữ liệu!',
                'now' => $request->day
                ]);
        }

        $statisticVehicle = ['car' => 0, 'motobike' => 0, 'bike' => 0];

        foreach($data as $value){
            $type_vehicle = $value->Vehicle_ID;
            switch ($type_vehicle) {
                case 'TVM0000001':
                    $statisticVehicle['car'] =  $value->total;
                    break;
                case 'TVM0000002':
                    $statisticVehicle['motobike'] =  $value->total;
                    break;
                case 'TVM0000003':
                    $statisticVehicle['bike'] =  $value->total;
                    break;
                default:
                    break;
            }
        }

        return response()->json([
            'isEmpty' => false,
            'data' => $statisticVehicle,
            'revenue' => $revenue, 
            'now' => $request->day
            ]);
    }

    public function statisticOfYear(Request $request)
    {
        $user = Session::get('user');
        $company_id = $user->Com_ID;

        $data = DB::table('parking_tbl')
        ->select('Vehicle_ID' , DB::raw('count(*) as total'))
        ->whereYear('Mod_Date', $request->year)
        ->whereExists(function ($query) use ($company_id) {
            $query->select(DB::raw(1))
                ->from('parking_area_mst')
                ->where('Com_ID', $company_id);
        })
        ->groupBy('Vehicle_ID')
        ->get()->toArray();

        $revenue = DB::table('parking_tbl')
        ->select(DB::raw('SUM(parking_tbl.Cost_Parking) as revenue'))
        ->whereYear('Mod_Date', $request->year)
        ->whereExists(function ($query) use ($company_id) {
            $query->select(DB::raw(1))
                ->from('parking_area_mst')
                ->where('Com_ID', $company_id);
        })
        ->first()->revenue;

        $statisticVehicle = ['car' => 0, 'motobike' => 0, 'bike' => 0];

        foreach($data as $value){
            $type_vehicle = $value->Vehicle_ID;
            switch ($type_vehicle) {
                case 'TVM0000001':
                    $statisticVehicle['car'] =  $value->total;
                    break;
                case 'TVM0000002':
                    $statisticVehicle['motobike'] =  $value->total;
                    break;
                case 'TVM0000003':
                    $statisticVehicle['bike'] =  $value->total;
                    break;
                default:
                    break;
            }
        }


        return response()->json([
            'isEmpty' => false,
            'data' => $statisticVehicle,
            'revenue' => is_null($revenue) ? 0 : $revenue, 
            'now' => $request->year
            ]);
    }

    public function info()
    {
        return view('info');
    }

    public function profile()
    {
        $user = Session::get('user');
        return view('profile', ['user' => $user]);

    }
}
