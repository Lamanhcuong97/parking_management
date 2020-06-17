<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\StatisticParking;
use App\LogLogIn;

class InfoParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = DB::table('user_mst')
        ->select(DB::raw('user_mst.User_ID, User_Name, Password, Full_Name, set_parking_tbl.Role_ID, Role_Name, Phone, set_parking_tbl.Parking_Area_ID'))
        ->join('set_parking_tbl', 'user_mst.User_ID', 'set_parking_tbl.User_ID')
        ->join('role_mst', 'set_parking_tbl.Role_ID', 'role_mst.Role_ID' )
        ->where('set_parking_tbl.MAC_Addr', $request->Mac_Addr ?? '90:06:28:D5:E4:E9')
        ->where('set_parking_tbl.Delete_Flag', 0)
        ->where('user_mst.Delete_Flag', 0)
        ->get()->toArray();

        $arr_parking_id = array_unique(array_column($user, "Parking_Area_ID"));

        foreach ($arr_parking_id as $value) {

            $adminCompany = DB::table('user_mst')
            ->select(DB::raw('user_mst.User_ID, User_Name, Password, Full_Name, role_mst.Role_ID, role_mst.Role_Name, Phone, parking_area_mst.Parking_Area_ID'))
            ->join('com_mst', 'user_mst.Com_ID', 'com_mst.Com_ID')
            ->join('role_mst', 'user_mst.Role_ID', 'role_mst.Role_ID' )
            ->join('parking_area_mst', 'com_mst.Com_ID', 'com_mst.Com_ID' )
            ->where('parking_area_mst.Parking_Area_ID', $value)
            ->whereIn('role_mst.Role_ID', ['RLM0000002'])
            ->where('user_mst.Delete_Flag', 0)
            ->get()->toArray();

            $adminParking = DB::table('user_mst')
            ->select(DB::raw('user_mst.User_ID, User_Name, Password, Full_Name, set_parking_tbl.Role_ID, Role_Name, Phone, set_parking_tbl.Parking_Area_ID'))
            ->join('set_parking_tbl', 'user_mst.User_ID', 'set_parking_tbl.User_ID')
            ->join('role_mst', 'set_parking_tbl.Role_ID', 'role_mst.Role_ID' )
            ->where('set_parking_tbl.Delete_Flag', 0)
            ->whereIn('role_mst.Role_ID', ['RLM0000004'])
            ->where('user_mst.Delete_Flag', 0)
            ->get()->toArray();

            $user = array_merge($user, $adminCompany, $adminParking);
        }

        $fee = DB::table('parking_fee')
        ->select(DB::raw('Vehicle_ID, Type_Of_Fee, Fee_SEQ, Time_Block, Unit_Price, Max_Price, Free_First_Time, Over_Time'))
        ->get()->toArray();

        $info = DB::table('parking_area_mst')
        ->select(DB::raw('parking_area_mst.Parking_Area_ID, CONCAT(Parking_Area_Name, " - ", parking_fee.Type_Of_Fee) as Parking_Area_Name,  com_mst.Com_ID, com_mst.Com_Name, com_mst.Com_Addr, com_mst.Com_Phone, com_mst.Com_Email, Type_Of_Fee, Version'))
        ->join('com_mst', 'parking_area_mst.Com_ID', 'com_mst.Com_ID')
        ->join('parking_fee', 'parking_area_mst.Parking_Area_ID', 'parking_fee.Parking_Area_ID' )
        ->where('parking_area_mst.Delete_Flag', 0)
        ->where('parking_fee.Delete_Flag', 0)
        ->where('parking_fee.fee_SEQ', 0)
        ->groupBy('parking_fee.Type_Of_Fee')
        ->get()->toArray();

        $data['user'] = $user;
        $data['fee'] = $fee;
        $data['info'] = $info;

        return response()->json([
            'data' => $data,
          ]);
    }

    public function uploadImage(Request $request)
    {
        $filenameWithExt = $request->file('avatar')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('avatar')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('avatar')->storeAs('public/vehicles', $fileNameToStore);
    }

    public function addParking(Request $request)
    {
        $parking = StatisticParking::where('Guard_ID', $request->Guard_ID)->first();

        if(count($luot) > 0){
            $parking = new StatisticParking();
            $parking->Guard_ID = $request->Guard_ID;
            $parking->Parking_Area_ID = $request->Parking_Area_ID;
            $parking->Vehicle_ID = $request->Vehicle_ID;
            $parking->Ticket_Code = $request->Ticket_Code;
            $parking->Type_Of_Fee = $request->Type_Of_Fee;
            $parking->License_Plates = $request->License_Plates;
            $parking->Time_In = $request->Time_In;
            $parking->Time_Out = $request->Time_Out;
            $parking->Url_Picture = $request->Url_Picture;
            $parking->Parking_Status = 0;
            $parking->Cost_Parking = 0;
            $parking->Reg_UID = $request->Guard_ID;
            $parking->Mod_UID = $request->Guard_ID;
            $parking->Reg_Date = $request->Time_In;
            $parking->Mod_Date = $request->Time_In;
            $is_saved = $parking->save();

            if ($is_saved) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data was inserted successfully'
                  ]);
            } else {
                return response()->json([
                    'success' => 0,
                    'message' => 'Insert failed. There were some errors when the insert occurred'
                  ]);
            }
        }else{
            $parking->Time_Out = $request->Time_Out;
            $parking->Url_Picture = $request->Url_Picture;
            $parking->Parking_Status = 1;
            $parking->Cost_Parking = $request->Cost_Parking;
            $parking->Mod_UID = $request->Guard_ID;
            $parking->Mod_Date = $request->Time_Out;
            $is_saved = $parking->save();
            
            if ($is_saved) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data was created successfully'
                  ]);
            } else {
                return response()->json([
                    'success' => 0,
                    'message' => 'Update failed. There were some errors when the update occurred'
                  ]);
            }
        }

    }

    public function addLogLogIn(Request $request)
    {
        $log_log_in = new LogLogIn();
        $log_log_in->User_ID = $request->User_ID;
        $log_log_in->Time_Log_In = $request->Time_Log_In;
        $log_log_in->Time_Log_Out = $request->Time_Log_Out;
        $log_log_in->Mac_Addr = $request->Mac_Addr;
        $log_log_in->Parking_Area_ID = $request->Parking_Area_ID;
        $is_saved = $log_log_in->save();
            
        if ($is_saved) {
            return response()->json([
                'success' => 1,
                'message' => 'Data was inserted successfully'
                ]);
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Update failed. There were some errors when the insert occurred'
                ]);
        }
    }

    public function addLogMerge(Request $request)
    {
        
        $check = DB::table('log_merge_data')->select('User_ID')->where('Merge_Date', $request->Merge_Date)->get();
        if(count($check) > 0){
           $check = DB::update("UPDATE log_merge_data SET Time_Log_In = concat( Time_Log_In,';$request->Time_Log_In') WHERE User_ID = '$request->User_ID' AND Merge_Date = '$request->Merge_Date'");

            if ($check) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data was inserted successfully'
                    ]);
            } else {
                return response()->json([
                    'success' => 0,
                    'message' => 'Update failed. There were some errors when the insert occurred'
                    ]);
            }
        }else{
            $check = DB::table('log_merge_data')->insert(
                [
                    'Time_Log_In' => $request->Time_Log_In,
                    'Merge_Date' =>  $request->Merge_Date,
                    'User_ID' => $request->User_ID
                ]
            );

            if ($check) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data was inserted successfully'
                    ]);
            } else {
                return response()->json([
                    'success' => 0,
                    'message' => 'Update failed. There were some errors when the insert occurred'
                    ]);
            }
        }
       
    }


}
