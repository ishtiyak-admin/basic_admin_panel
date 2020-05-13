<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLogOut
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard("admins")->check()) {
            if ( (Auth::guard("admins")->user()->role_id == 1) || (Auth::guard("admins")->user()->role_id == 5) ) {
                return redirect('admin');
            }else{
                return $next($request);
            }
        }
        return $next($request);
    }
}
