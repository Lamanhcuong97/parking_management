<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Parking;
use Auth;
use \Carbon\Carbon;
use Session;


class ParkingManagementController extends Controller
{
    public function __construct(){
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Company::all();
        $search = $request->all();
        $request->flash();

        if(!empty($search)){
            $parkings = Parkings::select("*");

            if( !is_null($request->parking_name)){
                $parkings = $parkings->Where('Parking_Area_Name', $request->parking_name);
            }

            if( !is_null($request->company_id)){
                $parkings = $parkings->Where('Com_ID', $request->company_id);
            }
            
            $parkings = $parkings->with('company')->get();

        }else{
            $parkings = Parking::with('company')->get();
        }

        return view('parkings.list-parking-area', ['companies' => $companies, 'parkings' => $parkings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parkings.add-parking-area');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();
        $date = $date->toDateTimeString();
        $user = Session::get('user');

        $parking = new Parking();
        $parking->Parking_Area_Name = $request->parking_area_name;
        $parking->Delete_Flag = $request->status;
        $parking->Mod_Date = $date;
        $parking->Com_ID = $user->Com_ID;
        $parking->Mod_UID = '';
        $parking->Reg_UID =  $user->User_ID;
        $parking->save();

        toastr()->success('Dữ liệu được lưu thành công!');
        return redirect()->route('parking-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parking = Parking::where('Parking_Area_ID', $id)->first();

        return view('parkings.detail-parking-area', ['parking' => $parking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $date = Carbon::now();
        $date = $date->toDateTimeString();
        $user = Session::get('user');

        $parking = Parking::where('Parking_Area_ID', $id);

        $parking->update(["Parking_Area_Name" =>  $request->parking_area_name]);
        $parking->update(["Delete_Flag" =>  $request->status]);
        $parking->update(["Mod_Date" =>  $date]);
        $parking->update(["Mod_UID" =>  $user->User_ID]);

        toastr()->success('Dữ liệu được lưu thành công!');

        return redirect()->route('parking-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date = Carbon::now();
        $date = $date->toDateTimeString();
        $user = Session::get('user');

        $parking = Parking::where('Parking_Area_ID', $id);

        $parking->update(["Delete_Flag" =>  1]);
        $parking->update(["Mod_UID" =>  $user->User_ID]);
        $parking->update(["Mod_Date" =>   $date]);

        toastr()->success('Dữ liệu được xóa thành công!');

        return redirect()->route('parking-management.index');  
    }
}
