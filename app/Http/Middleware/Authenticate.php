<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;


use Illuminate\Support\Facades\Request;


class Authenticate extends Middleware
{
    
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Request::is('/dashboard/student')) {
                return route('login');
            }
            elseif(Request::is('/dashboard/admin')) {
                return route('login');
            }
            elseif(Request::is('/dashboard/doctor')) {
                return route('login');
            }
            elseif(Request::is('/dashboard/accountant')) {
                return route('login');
            }
            else {
                return route('login');
            }
    }
}
}