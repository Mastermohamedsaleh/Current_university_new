<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;

use App\Http\Requests\SettingRequest;

use Illuminate\Support\Facades\Session;


use File;


class SettingController extends Controller
{
     

    public function index(){
        $settings = Setting::all();
        return view('Admin.setting.index',compact('settings'));
    }

    public function update(SettingRequest $request ){

      
      
        try{



        $setting = Setting::findorFail($request->setting_id);


         if (request()->hasFile('logo')){
            $logoPath = public_path('logo/'.$setting->logo);
            if(File::exists($logoPath)){
                unlink($logoPath);
            }
            $logoName = time().'.'.$request->file('logo')->extension();  
            $request->file('logo')->move(public_path('logo'), $logoName); 
            } else {
                $logoName = $setting->logo ;
            }




        $setting->unvirsty_name = $request->unvirsty_name;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->email = $request->email;
        $setting->logo = $logoName;
        $setting->link_facebook = $request->link_facebook;
        $setting->link_linked_in = $request->link_linked_in;
        $setting->link_youtube = $request->link_youtube;
        $setting->save();

        Session::flash('message', 'Update Success');       
        return redirect()->back();
    }
    catch(\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }



    }

}
