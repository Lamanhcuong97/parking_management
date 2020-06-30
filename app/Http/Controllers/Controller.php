<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use View;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;

    public function __construct() 
    {
       
        $this->middleware(function ($request, $next){
             // Fetch the Site Settings object
            $this->user = Session::get('user');
            // dd( Session::get('user'));
            View::share('user', $this->user);
            return $next($request);
        });
    }
}
