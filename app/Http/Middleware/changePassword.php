<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class changePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $logged =Auth::user()->logged;
            if($logged==1){
                return $next($request);
            }
            return redirect('/change/password');
//            return view('admin.users.changePassword');
        }
//
    }
}
