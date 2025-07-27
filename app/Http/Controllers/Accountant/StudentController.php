<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;


class StudentController extends Controller
{
      
    public function index(Request $request){
        $search = $request->input('search');          
        if ($search) {  
            $students = Student::where('college_id',auth()->user()->college_id)->where('name', 'like', "%$search%")->orwhere('email', 'like', "%$search%")->paginate(PAGENATOR_COUNT);
        }else{
            $students = Student::where('college_id',auth()->user()->college_id)->paginate(PAGENATOR_COUNT);  
        } 
        return view('Accountant.student',compact('students'));
    }
     
     
}
