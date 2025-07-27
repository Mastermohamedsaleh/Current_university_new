<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Assignment;
use App\Models\Course;
 
use App\Http\Requests\AssignmentRequest;

use Illuminate\Support\Facades\Session;

use File;

class AssignmentController extends Controller
{

    public function index()
    {
         
        $assignments = Assignment::where('doctor_id',auth()->user()->id)->get();
        return view('Doctor.Assignments.index',compact('assignments'));

    }


    public function create()
    {
        $data['courses'] = Course::where('doctor_id',auth()->user()->id)->get();
        return view('Doctor.Assignments.create', $data);
    }


    public function store(AssignmentRequest $request)
    {





        $course = Course::where('id' , $request->course_id)->first();
        try {
            $fileName = time().'.'.$request->file('file_name')->extension();  
            $request->file('file_name')->move(public_path('Assignment_Doctor'), $fileName);
            $assignment = new Assignment();
            $assignment->name = $request->name;
            $assignment->course_id =  $request->course_id;
            $assignment->college_id =  $course->college_id;
            $assignment->classroom_id =  $course->classroom_id;
            $assignment->section_id =  $course->section_id;
            $assignment->start_time =  $request->start_time;
            $assignment->end_time =  $request->end_time;
            $assignment->file_name =   $fileName;
            $assignment->degree =   $request->degree;
            $assignment->doctor_id = auth()->user()->id;
            $assignment->save();
            Session::flash('message', 'Add Success');
            return redirect()->route('assignments.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

          
         
    }


    public function show($id)
    {
        $assignment = Assignment::where('id',$id)->where('doctor_id',  auth()->user()->id)->pluck('file_name')->first();
        if($assignment){
          return view('Doctor.Assignments.show_pdf_doctor',compact('assignment'));
        }else{
          return redirect()->back();
    }
    }

    public function edit($id)
    {
        $assignment = Assignment::where('id',$id)->where('doctor_id',auth()->user()->id)->first();
        if(  $assignment ){
            $courses =  Course::where('doctor_id',auth()->user()->id)->get();
            return view('Doctor.Assignments.edit', compact('courses','assignment'));
        }else{
            return redirect()->back();
        }
    }


    public function update(AssignmentRequest $request, $id)
    {

        try{
             $course = Course::where('id' , $request->course_id)->first();     
             $Assignment = Assignment::findOrfail($id);         
               if (request()->hasFile('file_name')){
                   $file_name = public_path('Assignment_Doctor/'.$Assignment->file_name);
                   if(File::exists($file_name)){
                       unlink($file_name);
                   }
                   $file_name = time().'.'.$request->file('file_name')->extension();  
                   $request->file('file_name')->move(public_path('Assignment_Doctor'), $file_name); 
                   } else {
                       $file_name =  $Assignment->file_name;
                   }
       
                   $Assignment->name = $request->name;
                   $Assignment->file_name =   $file_name;
                   $Assignment->doctor_id =  auth()->user()->id;
                   $Assignment->course_id =  $request->course_id;
                   $Assignment->college_id =  $course->college_id;
                   $Assignment->classroom_id =  $course->classroom_id;
                   $Assignment->section_id =  $course->section_id;
                   $Assignment->degree =   $request->degree;
                   $Assignment->save();
                   Session::flash('message', 'Update Success');
                   return redirect()->route('assignments.index');
       
               } catch (\Exception $e) {
                   return redirect()->back()->withErrors(['error' => $e->getMessage()]);
              }

    }

    public function destroy($id)
    {
          
        $Assignment = Assignment::findOrFail($id);
        $Assignment_path = public_path("Assignment_Doctor/{$Assignment->file_name}");
    
        if (File::exists($Assignment_path)) {
            File::delete($Assignment_path);
        }
        $Assignment->delete();
        Session::flash('message', 'Delete Success');
        return redirect()->route('assignments.index');

         
    }
}
