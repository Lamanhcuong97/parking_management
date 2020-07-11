<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;
use \Carbon\Carbon;
use Session;


class CompanyManagementController extends Controller
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
        
        $search = $request->all();
        $request->flash();

        if(!empty($search)){

            $companies = Company::select("*");

            if( !is_null($request->company_name)){
                $companies = $companies->Where('Com_Name', 'LIKE', '%' . $request->company_name . '%' );
            }

            if( !is_null($request->company_addr)){
                $companies = $companies->Where('Com_Addr', 'LIKE', '%' . $request->company_addr . '%' );
            }

            if( !is_null($request->company_phone)){
                $companies = $companies->Where('Com_Phone', 'LIKE', '%' . $request->company_phone . '%' );
            }

            if( !is_null($request->company_email)){
                $companies = $companies->Where('Com_Email', 'LIKE', '%' . $request->company_email . '%' );
            }

            $companies =  $companies->get();
        }else{
            $companies = Company::all();
        }

        return view('companies.list-company', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.add-company');
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

        $company = new Company();
        $company->Com_Name = $request->company_name;
        $company->Com_Addr = $request->company_addr;
        $company->Com_Phone = $request->company_phone;
        $company->Com_Email = $request->company_email;
        $company->Delete_Flag = $request->status;
        $company->Reg_Date = $date;
        $company->Mod_Date = $date;
        $company->Mod_UID = 0;
        $company->Reg_UID = $user->User_ID ;
        $company->save();

        toastr()->success('Dữ liệu được lưu thành công!');
        
        return redirect()->route('company-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::where('Com_ID', $id)->first();


        return view('companies.detail-company', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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

        $company = Company::where('Com_ID', $id);

        $company->update(["Com_Name" =>  $request->company_name]);
        $company->update(["Com_Addr" =>  $request->company_addr]);
        $company->update(["Com_Phone" =>  $request->company_phone]);
        $company->update(["Com_Email" =>  $request->company_email]);
        $company->update(["Delete_Flag" =>  $request->status]);
        $company->update(["Mod_Date" =>  $date]);
        $company->update(["Mod_UID" =>  $user->User_ID]);

        toastr()->success('Dữ liệu được lưu thành công!');
        
        return redirect()->route('company-management.index');
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

        $company = Company::where('Com_ID', $id);

        $company->update(["Delete_Flag" =>  1]);
        $company->update(["Mod_Date" =>  $date]);
        $company->update(["Mod_UID" =>  $user->User_ID]);

        toastr()->success('Dữ liệu được xóa thành công!');
        
        return redirect()->route('company-management.index');
    }
}
