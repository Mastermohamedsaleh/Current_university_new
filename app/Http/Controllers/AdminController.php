<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\College;


use App\Http\Requests\adminrequest;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  
    public function index()
    {
         $admins = Admin::where('status',1)->get();
         $colleges = College::all();
         return view('Admin.admins.index',compact('admins','colleges'));
    }

  
    public function create()
    {
        //
    }

 
    public function store(adminrequest $request)
    {
           
        try{

            $admin = new Admin();
            $admin->name = $request->name;
            $admin->email =   $request->email;
            $admin->college_id =   $request->college_id;
            $admin->status =  1;
            $admin->password =  Hash::make($request->password);
            $admin->save();


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

    public function update(adminrequest $request, Admin $admin)
    {
        try{

            $admin = Admin::findOrFail($admin->id);
            $admin->name = $request->name;
            $admin->email =   $request->email;
            $admin->college_id =   $request->college_id;
            
            $admin->password =   $request->oldpassword;
            $admin->update();

            Session::flash('message', 'Udpate Success');  
            return redirect()->back();

        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        
        $admin = Admin::findOrFail($id)->delete();
    
        return redirect()->route('admins.index');

   
    }
}
