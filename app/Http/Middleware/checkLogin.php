<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        // dd($request->user());// sao no vao home r kia
        dd(Auth::guard($guard)->check());
        $user = User::where([
            'User_Name' => $request->User_Name,
            'Password' => md5($request->password)
        ])->first();
        dd($user);
        if (!Auth::guard($guard)->check()) {
            return redirect('/login');
        }
    
        return $next($request);
    }
}
