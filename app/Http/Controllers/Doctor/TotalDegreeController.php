<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Student;
use App\Models\Quizze;
use App\Models\Degree;

class TotalDegreeController extends Controller
{
      

    public function index(){
       $courses = Course::where('doctor_id',auth()->user()->id)->get();
       return view('Doctor.Degree.course',compact('courses'));
    }

    public function show(Request $request,$course_id){      
         $course =    Course::where('id',$course_id)->where('doctor_id',auth()->user()->id)->first();
         if($course){   
            $search = $request->input('search');          
            if ($search) {  
               $students = Student::where('name', 'like', "%$search%")->orwhere('email', 'like', "%$search%")->where('college_id',$course->college_id)->where('classroom_id',$course->classroom_id)->where('section_id',$course->section_id)->paginate(PAGENATOR_COUNT);
            }else{
               $students =  Student::where('college_id',$course->college_id)->where('classroom_id',$course->classroom_id)->where('section_id',$course->section_id)->get();  
            } 
            return   view('Doctor.Degree.allstudentcourse',compact('students','course'));
         }else{
            return redirect()->back();
         }
       
    }
     

    public function viewdegree($student_id , $course_id){

       $id_course = Course::where('doctor_id',auth()->user()->id)->where('id',$course_id)->pluck('id')->first(); 

       if($id_course == $course_id){
     
        $score =  Degree::where('course_id',$course_id)->where('student_id',$student_id)->sum('score');
       
        $quizzes =  Degree::where('course_id',$course_id)->where('student_id',$student_id)->get();
  
         return view('Doctor.Degree.viewquizzes',compact('score','quizzes'));
       }else{
        return redirect()->back();
       }

    }
     
}
