<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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

    // function login(Request $request){

    //     $this->validate($request, [
    //         'User_Name' => 'required', 
    //         'password' => 'required',
    //     ]);

    //     $user = User::where('User_Name', '=', $request->User_Name)->first();

    //     if(isset($user)) {
    //         if($user->Password == md5($request->password)) { // If their password is still MD5
    //             Auth::login($user);
    //         }
    //     }

    //     // dd(Auth::check());
    //     // em check ở đây thì nó trả ra true rồi

    //     if ( Auth::check() ) {
    //         return redirect()->intended(route('home'));
    //     }
    // }
    protected function attemptLogin(Request $request)
{
    $user = User::where([
        'User_Name' => $request->User_Name,
        'Password' => md5($request->password)
    ])->first();
    // dd(123, $user);
    
    if ($user) {
        $this->guard()->login($user, $request->has('remember'));
        // dd('x');// loi nay cung giong cua em a
        // ?làm thế nào để nó xác thực ạ up len git di de a thu mo xem @@ vâng

        return $request; // do cái này a ạ
    }

    return false;
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
