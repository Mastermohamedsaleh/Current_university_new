<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;

class DoctorCollegeController extends Controller
{
    

    public function index(){
        $doctor_colleges =  Course::where('doctor_id',auth()->user()->id)->get();
        return view('Doctor.My_class.index',compact('doctor_colleges'));
    }

}
