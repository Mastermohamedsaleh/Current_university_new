<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Accountant;
use App\Models\College;
use App\Http\Requests\AccountantRequest;



use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;


class AccountantController extends Controller
{


    public function index()
    {
        if(auth()->user()->status == 0 ){
            $accountants = Accountant::all();
            $colleges = College::all();
        }else{
            $accountants = Accountant::where('college_id',auth()->user()->college_id)->get();
            $colleges = College::where('id',auth()->user()->college_id)->get();
        }

        return view('Admin.accountants.index',compact('accountants','colleges'));
    }



    public function create()
    {
        // return view('Admin.accountants.index',compact('colleges'));
          
    }


    public function store(AccountantRequest $request)
    {
        try{

            $accountant = new Accountant();
            $accountant->name = $request->name;
            $accountant->email =   $request->email;
            $accountant->ssn =   $request->ssn;
            $accountant->college_id =   $request->college_id;
            $accountant->password =  Hash::make($request->password);
            $accountant->save();
            Session::flash('message', 'Add Success'); 
            return redirect()->back();
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(AccountantRequest $request, $id)
    {
        try{

            $accountant = Accountant::findOrFail($id);
            $accountant->name = $request->name;
            $accountant->email =   $request->email;
            $accountant->college_id =   $request->college_id;
            $accountant->ssn =   $request->ssn;
            $accountant->update();
            Session::flash('message', 'Udpate Success');  
            return redirect()->back();

        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    

    public function destroy($id)
    {
            
        $admin = Accountant::findOrFail($id)->delete();
        Session::flash('message', 'Delete Success'); 
        return redirect()->route('Admin.accountant.index');
    }
}
