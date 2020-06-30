<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()   
    {
        $this->middleware('guest')->except('logout');
        
    }

    public function username()
    {
        return 'User_Name';
    }

    public function showLoginForm()
    {
        $user = Session::get('user');

        if (!is_null($user)) {
            return redirect('/');
        }

        return view('auth.login');
    }

    function login(Request $request){
        $request->flash();

        $validatorRules = array(
            'User_Name' => 'required', 
            'password' => 'required',
        );

        $validator = Validator::make($request->all(), $validatorRules);

        $user = User::where('User_Name', '=', $request->User_Name)->first();

       
        if(isset($user)) {

            if($user->Role_ID == 'RLM0000005') { // If their password is still MD5
                $validator->messages()->add('User_Name', 'Người dùng không có quyền truy cập hệ thống.');
                return redirect('/login')->withErrors($validator->errors());
            }

            if($user->Password == md5($request->password)) { // If their password is still MD5
                Session::put('user', $user);
                Auth::login($user);
                return redirect()->intended(route('home'));
            }else {
                $validator->messages()->add('User_Name', 'Thông tin đăng nhập chưa đúng.');
                return redirect('/login')->withErrors($validator->errors());
            }
        }else{
            $validator->messages()->add('User_Name', 'Thông tin đăng nhập chưa đúng.');
            return redirect('/login')->withErrors($validator->errors());
        }

        // if ( Auth::check() ) {
        //     return redirect()->intended(route('home'));
        // }
    }

    public function logout(Request $request) {
        Auth::logout();
        Session::forget('user');
        return redirect('/login');
      }

  

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $messages = [
            'password.required' => 'Password cannot be empty',
        ];

        $request->validate([
            'password' => 'required|string',
        ], $messages);
    }

}
