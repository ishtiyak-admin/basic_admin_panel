<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserLogIn
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard("users")->check()) {
            return redirect('customer/login');
        }else if (Auth::guard("users")->user()->role_id != 2) {
            return redirect('customer/login');
        }else if (Auth::guard("users")->user()->is_delete == 1) {
            return redirect('customer/logout');
        }else if (Auth::guard("users")->user()->status == 0) {
            return redirect('customer/logout');
        }

        return $next($request);
    }
}
