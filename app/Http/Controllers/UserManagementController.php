<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Company;
use App\Role;
use Auth;
use App\Http\Requests\UserRequest;
use \Carbon\Carbon;
Use Alert;
use Session;


class UserManagementController extends Controller
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
        $companies = Company::all();
        $user = Session::get('user');
        $company_id = $user->Com_ID;
        $request->flash();

        if(!empty($search)){
            $users = User::select("*")->whereHas('company', function ($query) use ($company_id) {
                $query->where('Com_ID', $company_id);
            });

            if( !is_null($request->user_name)){
                $users = $users->Where('User_Name', 'LIKE', '%' . $request->user_name . '%');
            }

            if( !is_null($request->full_name)){
                $users = $users->Where('Full_Name', 'LIKE', '%' . $request->full_name . '%');
            }

            if( !is_null($request->company_id)){
                $users = $users->Where('Com_ID', $request->company_id);
            }
            
            $users = $users->with(['company', 'role'])->get();

        }else{
            $users = User::with(['company', 'role'])->whereHas('company', function ($query) use ($company_id) {
                $query->where('Com_ID', $company_id);
            })->get();
        }

        return view('users.list-user', ['users' => $users, 'companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.add-user', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $date = Carbon::now();
        $date = $date->toDateTimeString();
        $user = Session::get('user');

        User::create([
            'User_Name' => $request->user_name,
            'Full_Name' =>  $request->full_name,
            'Role_ID' =>  $request->role_id,
            'Com_ID' =>  $user->Com_ID,
            'Delete_Flag' =>  0,
            'Phone' =>  $request->phone,
            'Mod_Date' =>  $date,
            'Reg_UID' =>  $user->User_ID,
            'Mod_UID' =>   $user->User_ID,
            'password' => md5($request->password),
        ]);

        toastr()->success('Dữ liệu được lưu thành công!');

        return redirect()->route('user-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::all();
        $user = User::where('User_ID', $id)->first();

        return view('users.detail-user', ['user' => $user, 'roles' => $roles]);
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
        // Alert::question('Question Title', 'Question Message');
        $date = Carbon::now();
        $date = $date->toDateTimeString();
        $user = Session::get('user');
        

        User::where('User_ID', $id)->update([
            'Full_Name' =>  $request->full_name,
            'Role_ID' =>  $request->role_id,
            'Com_ID' =>  $user->Com_ID,
            'Delete_Flag' =>  0,
            'Phone' =>  $request->phone,
            'Mod_Date' =>  $date,
            'Mod_UID' =>  $user->User_ID,
        ]);

        toastr()->success('Dữ liệu được lưu thành công!');

        return redirect()->route('user-management.index');
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
        

        User::where('User_ID', $id)->update([
            'Delete_Flag' =>  1,
            'Mod_Date' =>  $date,
            'Mod_UID' =>  $user->User_ID,
        ]);

        toastr()->success('Dữ liệu được xóa thành công!');

        return redirect()->route('user-management.index');
    }
}
