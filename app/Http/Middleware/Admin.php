<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Session\Store;


class Admin {

    public function handle($request, Closure $next,$role)
    {
        /// echo "<pre>";
        $access=session('accesslist_id');
        //Show login if user login timed out
        if (!is_array($access)) {
            Auth::logout();
            return redirect('/login')->with('message', 'sorry!!! you are not allowed to do this task.');
        }
        if( is_array($access)&& ((!in_array(1,$access)&&!in_array(2,$access))) && $role=="user")
        {
            session(["access"=>"user/"]);
            return $next($request);
        }else{
            session(["access"=>"admin/"]);
            return $next($request);
        }


    }

}