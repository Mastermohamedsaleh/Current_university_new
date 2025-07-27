<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Auth\AccountantLoginRequest;


class AccountantController extends Controller
{
    
    public function store(AccountantLoginRequest $request)
    {

        if($request->authenticate()){

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::ACCOUNTANT);
        }

        return redirect()->back()->withErrors(['name' => 'Email Or Password Wrong !' ]);

    }

 
    public function destroy(Request $request)
    {
        Auth::guard('accountant')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');


    }

      
 
     
}
