<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;

class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = Session::get('user');
        $is_expire = Session::get('_token');

        if(is_null($is_expire)){
            Session::forget('user');
        }
            
        if (is_null($user)) {
            return redirect('/login');
        }
    
        return $next($request);
    }
}
