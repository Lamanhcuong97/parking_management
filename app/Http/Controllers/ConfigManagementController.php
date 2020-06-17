<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingFee;
use App\Parking;
use App\VehicleType;
use App\ConfigParking;
use App\Role;
use App\User;
use DB;
use Session;
use \Carbon\Carbon;

class ConfigManagementController extends Controller
{
    public function configFee(Request $request)
    {
        $vehicle_types = VehicleType::all();
        $parkings = Parking::all();

        $search = $request->all();
        $request->flash();

        if(!empty($search)){

            $parking_fees = ParkingFee::select("*");

            if( !is_null($request->parking_id)){
                $parking_fees = $parking_fees->Where('Parking_Area_ID', $request->parking_id);
            }

            if( !is_null($request->vehicle_type)){
                $parking_fees = $parking_fees->Where('Vehicle_ID', $request->vehicle_type);
            }

            $parking_fees =  $parking_fees->with(['parking', 'vehicle_type'])->get();
        }else{
            $parking_fees = ParkingFee::with(['parking', 'vehicle_type'])->get();
        }
        
        return view('configs.config-fee', ['parking_fees' => $parking_fees, 'vehicle_types' => $vehicle_types , 'parkings' => $parkings]);
    }

    public function  configParking(Request $request)
    {
        $parkings = Parking::all();
        $roles = Role::all();
        $users = User::all();

        $search = $request->all();
        $request->flash();

        if(!empty($search)){

            $config_parkings = ConfigParking::select("*");

            if( !is_null($request->search_parking_id)){
                $config_parkings = $config_parkings->Where('Parking_Area_ID', $request->search_parking_id);
            }

            if( !is_null($request->search_role_id)){
                $config_parkings = $config_parkings->Where('Role_ID', $request->search_role_id);
            }

            if( !is_null($request->search_user_id)){
                $config_parkings = $config_parkings->Where('User_ID', $request->search_user_id);
            }

            $config_parkings =  $config_parkings->with(['parking', 'user'])->get();
        }else{
            $config_parkings = ConfigParking::with(['parking', 'user'])->get();
        }
        
        return view('configs.config-parking', ['config_parkings' => $config_parkings, 'users' => $users , 'parkings' => $parkings, 'roles' => $roles]);
    }

    public function setConfigFee(Request $request)
    {
        $date = Carbon::now();
        $date = $date->toDateTimeString();  
        $user = Session::get('user');

        $length = count($request->fee_seqs);
        if($length > 0){
            for ($i=0 ; $i < $length ; $i++) {
                ParkingFee::create([
                    'Parking_Area_ID' => $request->parking_id, 
                    'Vehicle_ID' => $request->type_vehicle, 
                    'Type_Of_Fee' => $request->type_fee, 
                    'Fee_SEQ' => $request->fee_seqs[$i], 
                    'Time_Block' => $request->time_blocks[$i], 
                    'Unit_Price' => str_replace(',', '', $request->unit_prices[$i]), 
                    'Max_Price' => str_replace(',', '', $request->max_price), 
                    'Free_First_Time' => $request->free_first_time, 
                    'Over_Time' => $request->over_time, 
                    'Delete_Flag' => $request->status[$i], 
                    'Reg_UID' => $user->User_ID, 
                    'Reg_Date' => $date, 
                    'Mod_Date' => $date,
                    'Mod_UID' => $user->User_ID, 
                    
                ]);
            }
        }
        toastr()->success('Dữ liệu được lưu thành công!');
        
        return redirect()->route('config.configFee');
    }

    public function setConfigParking(Request $request)
    {
        $date = Carbon::now();
        $date = $date->toDateTimeString();  
        $user = Session::get('user');

        ConfigParking::create([
            'Parking_Area_ID' => $request->parking_id, 
            'User_ID' => $request->user_id, 
            'Role_ID' => $request->role_id, 
            'MAC_Addr' => $request->mac_addr, 
            'Delete_Flag' => $request->status, 
            'Reg_UID' => $user->User_ID, 
            'Reg_Date' => $date, 
            'Mod_Date' => $date,
            'Mod_UID' => $user->User_ID, 
            
        ]);
        toastr()->success('Dữ liệu được lưu thành công!');
        return redirect()->route('config.configParking');
    }
}
