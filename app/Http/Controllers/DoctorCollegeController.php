<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Doctor;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;




class DoctorCollegeController extends Controller
{
 
    public function index()
    {
 
        if(auth()->user()->status == 0){ 
            $doctors =  Doctor::all(); 
         }else{
            $doctors =  Doctor::where('college_id',auth()->user()->college_id)->get(); 
        }
         
         
        return view('Admin.doctor_college.index',compact('doctors')); 
    }


    public function create()
    {
    }

  
    public function store(DoctorCollegeRequest $request)
    {
               
    }

  
    public function show($id)
    {

        if(auth()->user()->status == 0){ 
            $doctor_colleges =  Course::where('doctor_id',$id)->get();
         }else{
            $doctor_colleges =  Course::where('doctor_id',$id)->where('college_id',auth()->user()->college_id)->get();
        }


     

         if(  !$doctor_colleges){
            return redirect()->back();
         }else{
            return view('Admin.doctor_college.show',compact('doctor_colleges'));
         }
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
    }
}
