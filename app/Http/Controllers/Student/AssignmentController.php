<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Assignment;
use App\Models\ViewAssignment;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

use File;

class AssignmentController extends Controller
{
 
    public function index(){

       $assignments = Assignment::where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id',    Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)
        ->orderBy('id', 'DESC')
        ->get();
     return view('Student.Assignments.index', compact('assignments'));
    }
 
    public function show($id){     
      $assignment = Assignment::where('id',$id)->where('college_id',  Auth::guard('student')->user()->college_id)
      ->where('classroom_id', Auth::guard('student')->user()->classroom_id)
      ->where('section_id', Auth::guard('student')->user()->section_id)->first();
      if($assignment){
        return view('Student.Assignments.show',compact('assignment'));
      }else{
        return redirect()->back();
      }
    }



    public function show_pdf($id){
      $assignment = Assignment::where('id',$id)->where('college_id',  Auth::guard('student')->user()->college_id)
      ->where('classroom_id', Auth::guard('student')->user()->classroom_id)
      ->where('section_id', Auth::guard('student')->user()->section_id)->pluck('file_name')->first();
      if($assignment){
        return view('Student.Assignments.show_pdf',compact('assignment'));
      }else{
        return redirect()->back();
      }
    }

    public function uploadassignment(Request $request ,$course_id){
      try{


        $assignment = Assignment::where('id' ,$request->id)->first();
        $mytime = \Carbon\Carbon::now('Africa/Cairo');
        $mytime = $mytime->toDateTimeString();
        $end_time = $assignment->end_time;
        $start_time = $assignment->start_time;
       if( $mytime <= $end_time ){ 
         $Assignment = ViewAssignment::where('assignment_id' ,$request->id)->where('student_id',auth()->user()->id)->first(); 
    
         if($Assignment){
          $file_name = public_path('Assignment_Student/'.$Assignment->file_name);
          if(File::exists($file_name)){
              unlink($file_name);
          }

          $validated = $request->validate([
            'file_name' => 'required|mimes:pdf|max:10000',
        ]);
          $file_name = time().'.'.$request->file('file_name')->extension();  
          $request->file('file_name')->move(public_path('Assignment_Student'), $file_name); 
  
          $Assignment->file_name = $file_name;
          $Assignment->student_id = auth()->user()->id;
          $Assignment->course_id = $course_id;
          $Assignment->assignment_id = $request->id;
          $Assignment->save();
          Session::flash('message', 'Update Success');
          return redirect()->route('view_assignment');
        }else{
          $validated = $request->validate([
            'file_name' => 'required|mimes:pdf|max:10000',
        ]);
          $fileName = time().'.'.$request->file('file_name')->extension();  
          $request->file('file_name')->move(public_path('Assignment_Student'), $fileName);
          $assignment =  new  ViewAssignment();
          $assignment->file_name =  $fileName ;
          $assignment->student_id = auth()->user()->id;
          $assignment->course_id = $course_id;
          $assignment->assignment_id = $request->id;
          $assignment->save();
          Session::flash('message', 'Submit Success');
          return redirect()->route('view_assignment');
        }


       }
             
      }catch (\Exception $e) {
          return redirect()->back()->with(['error' => $e->getMessage()]);
      }
       
    }
     
}
