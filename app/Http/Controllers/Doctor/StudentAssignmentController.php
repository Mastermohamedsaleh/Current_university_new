<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Student;
use App\Models\ViewAssignment;
use App\Models\DegreeAssignment;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

class StudentAssignmentController extends Controller
{
    

    public function index(){
        $courses = Course::where('doctor_id',auth()->user()->id)->get();
        return view('Doctor.Assignments.course',compact('courses'));
    }

    public function show(Request $request ,$course_id){      
        $course =    Course::where('id',$course_id)->where('doctor_id',auth()->user()->id)->first();
        if($course){

          $search = $request->input('search');          
          if ($search) {  
             $students = Student::where('name', 'like', "%$search%")->orwhere('email', 'like', "%$search%")->where('college_id',$course->college_id)->where('classroom_id',$course->classroom_id)->where('section_id',$course->section_id)->paginate(PAGENATOR_COUNT);
          }else{
             $students =  Student::where('college_id',$course->college_id)->where('classroom_id',$course->classroom_id)->where('section_id',$course->section_id)->paginate(PAGENATOR_COUNT);  
          } 
           return   view('Doctor.Assignments.allstudentcourse',compact('students','course'));
        }else{
           return redirect()->back();
        }
      
   }

   public function viewastudentssignment($student_id , $course_id){
    
      $id_course = Course::where('doctor_id',auth()->user()->id)->where('id',$course_id)->pluck('id')->first(); 
       if($id_course == $course_id){
         $viewassignments =  ViewAssignment::where('course_id',$course_id)->where('student_id',$student_id)->get();
         $score =  DegreeAssignment::where('course_id',$course_id)->where('student_id',$student_id)->sum('score');
         return view('Doctor.Assignments.viewassignment',compact('viewassignments','score'));
       }else{
        return redirect()->back();
       }

     
     

   }

    public function show_pdf_student($viewassignment_id,$coure_id){
        $assignment = ViewAssignment::where('id',$viewassignment_id)->where('course_id',$coure_id)->pluck('file_name')->first();
        if($assignment){
          return view('Doctor.Assignments.show_pdf',compact('assignment'));
        }else{
          return redirect()->back();
        }
    }


    public function pdfstudentassignment($viewassignment_id , $coure_id){
      $viewassignment = ViewAssignment::where('id',$viewassignment_id)->where('course_id',$coure_id)->first();
      if($viewassignment){
        return view('Doctor.Assignments.studentassignment',compact('viewassignment'));
      }else{
        return redirect()->back();
      }
    }

    public function degreestudentassignment(Request $request){
        
      $Assignment = DegreeAssignment::where('assignment_id' ,$request->assignment_id)->where('student_id',$request->student_id)->first();  
  try{
  if($Assignment){
    $validated = $request->validate([
      'score' => 'required|numeric|max:100',
  ]);
  
  $Assignment->score =  $request->score ;
  $Assignment->assignment_id = $request->assignment_id;
  $Assignment->course_id = $request->course_id;
  $Assignment->student_id = $request->student_id;
  $Assignment->save();
  }else{
    $validated = $request->validate([
      'score' => 'required|numeric|max:100',
  ]);
  $assignment =  new  DegreeAssignment();
  $assignment->score =  $request->score ;
  $assignment->assignment_id = $request->assignment_id;
  $assignment->course_id = $request->course_id;
  $assignment->student_id = $request->student_id;
  $assignment->save();
  }
  Session::flash('message', 'Submit Success');
  return redirect()->back();
  }catch (\Exception $e) {
      return redirect()->back()->with(['error' => $e->getMessage()]);
  }

        }
     

}
