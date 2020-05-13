<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLogIn
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard("admins")->check()) {
            return redirect('admin/login');
        }else if ( (Auth::guard("admins")->user()->role_id != 1) && (Auth::guard("admins")->user()->role_id != 5) ) {
            return redirect('admin/login');
        }
        return $next($request);
    }
}
