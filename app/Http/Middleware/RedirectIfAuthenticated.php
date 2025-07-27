<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
  
    public function handle($request, Closure $next){
    
        if (auth('web')->check()){
            return redirect(RouteServiceProvider::HOME);
        }

        if (auth('admin')->check()){
            return redirect(RouteServiceProvider::ADMIN);
        }
        if (auth('student')->check()){
            return redirect(RouteServiceProvider::STUDENT);
        }
        if (auth('doctor')->check()){
            return redirect(RouteServiceProvider::DOCTOR);
        }
        if (auth('accountant')->check()){
            return redirect(RouteServiceProvider::ACCOUNTANT);
        }

        return $next($request);
    }
}
