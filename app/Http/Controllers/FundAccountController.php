<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FundAccount;


class FundAccountController extends Controller
{
    public function index(){
        return view('Admin.Fee.fundaccount');
    }

    public function fundaccount(Request $request){
      $fundaccount =  FundAccount::whereBetween('date', [$request->from, $request->to])->sum('Debit');
      return view('Admin.Fee.fundaccount',compact('fundaccount'));
    }
}
