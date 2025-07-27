<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Doctor;
use App\Models\Accountant;
use Illuminate\Support\Facades\Session;

use File;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
       
    public function profile(){
        return  view('Admin.admins.profile');  
     }


    public function doctorprofile(){
        return  view('Admin.doctors.profile');
    }

    public function studentprofile(){
        return  view('Admin.students.profile');
    }

    public function accountantprofile(){
        return  view('Admin.accountants.profile');
    }

    public function updateprofile(Request $request ,$id){



        if(auth('admin')->check()){
            $guard = 'admin';   
            $Model=  '\App\Models\Admin' ;   
          }elseif(auth('student')->check()){
              $guard = 'student';
              $Model = '\App\Models\Student';  
          }elseif(auth('doctor')->check()){
              $guard = 'doctor'; 
              $Model = '\App\Models\Doctor';  
          }else{
              $guard = 'accountant'; 
              $Model = '\App\Models\Accountant';
          }


          if($request->action == 'delete'){
            $authall =  $Model::findOrfail($id);         
            $imagePath = public_path('image/'.$authall->image_name);
            if(File::exists($imagePath)){
                unlink($imagePath);  
            }
            $authall->image_name = "default.jpg";
            $authall->save();
            Session::flash('message', 'delete Success'); 
            return redirect()->back();
          }else{

            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:admins,email,'.$id
            ]);
    
    
          $authall =  $Model::findOrfail($id);         
            try{
            if (request()->hasFile('image')){
                $imagePath = public_path('image/'.$authall->image_name);
                if(File::exists($imagePath)){
                    unlink($imagePath);
                }
                $fileName = time().'.'.$request->file('image')->extension();  
                $request->file('image')->move(public_path('image'), $fileName); 
                } else {
                    $fileName = $authall->image_name ;
                }
              
           $authall->name = $request->name;
           $authall->email = $request->email;
           $authall->image_name =   $fileName;
           $authall->save();
    
           
           Session::flash('message', 'Udpate Success'); 
           
           return redirect()->back();
          


       

    }catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
          }

    }



// Edit On Pass 
    public function updatePassword(Request $request) 
    {
        if(auth('admin')->check()){
          $guard = 'admin';   
          $Model=  '\App\Models\Admin' ;   
        }elseif(auth('student')->check()){
            $guard = 'student';
            $Model = '\App\Models\Student';  
        }elseif(auth('doctor')->check()){
            $guard = 'doctor'; 
            $Model = '\App\Models\Doctor';  
        }else{
            $guard = 'accountant'; 
            $Model = '\App\Models\Accountant';
        }

                # Validation
                $request->validate([
                    'old_password' => 'required',
                    'new_password' => 'required|confirmed',
                ]);

                if(!Hash::check($request->old_password, Auth::guard($guard)->user()->password)){
                    return back()->with("message", "Old Password Doesn't match!");
                }
 
                
        #Update the new Password
        $Model::whereId(Auth::guard($guard)->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        // return   $Model::where('id' ,Auth::guard($guard)->user()->id)->get();

        return back()->with("message", "Password changed successfully!");


    }


     
}
