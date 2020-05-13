<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserLogOut
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard("users")->check()) {
            if (Auth::guard("users")->user()->role_id == 2) {
                return redirect('/');
            }else{
                return $next($request);
            }
        }

        return $next($request);
    }
}
