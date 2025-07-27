<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Doctor;
use App\Models\College;
use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\DB;

use File;



class CourseController extends Controller
{

    public function index()
    {
  
        if(auth()->user()->status == 0){
            $data['courses'] = Course::all();
            $data['doctors'] = Doctor::all();
        }else{
            $data['courses'] = Course::where('college_id',auth()->user()->college_id)->get();
            $data['doctors'] = Doctor::where('college_id',auth()->user()->college_id)->get();
        }
         

        return view('Admin.courses.index',$data);
    }

 

    public function create()
    {

        if(auth()->user()->status == 0){
            $data['courses'] = Course::all();
            $data['colleges'] = College::all();
            $data['doctors'] = Doctor::all();
         }else{
            $data['courses'] = Course::where('college_id',auth()->user()->college_id)->get();
            $data['colleges'] = College::where('id',auth()->user()->college_id)->get();
            $data['doctors'] = Doctor::where('college_id',auth()->user()->college_id)->get();
        }

 
        return view('Admin.courses.create',$data);
    }

 
    public function store(CourseRequest $request)
    {

        try {

            $name = $request->name;

            if($name == NULL) {
                Session::flash('danger', 'Add name Course'); 
                return redirect()->back();
            }

            $college = $request->college_id;
            $classroom = $request->classroom_id;
            $section = $request->section_id;
            $doctor = $request->doctor_id;
            $semester = $request->semester;

            for($i = 0 ; $i < count($name) ; $i++){
                $insert = [
                    'name' => $name[$i],
                    'doctor_id'=>$doctor[$i],
                    'college_id'=>$college,
                    'classroom_id'=>$classroom,
                    'section_id'=>$section,
                    'semester'=>$semester,
                  ];
            DB::table('courses')->insert($insert);

            } 
        
            Session::flash('message', 'Add Success'); 
            return redirect()->route('course.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


   
    public function show($id)
    {

        if(auth()->user()->status == 0 ){
            $course    =  Course::where('id',$id)->first();
        }else{
            $course    =  Course::where('id',$id)->where('college_id',auth()->user()->college_id)->first();
        }
        if($course){
            if(auth()->user()->status == 0){
                $colleges = College::all();
                $classrooms = Classroom::all();
                $sections = Section::all();
                $doctors = Doctor::all();
                return view('Admin.courses.show',compact('course','colleges','classrooms','sections','doctors'));
            }else{
                $colleges = College::where('id',auth()->user()->college_id)->get();
                $classrooms = Classroom::where('college_id',auth()->user()->college_id)->get();
                $sections = Section::where('college_id',auth()->user()->college_id)->get();
                $doctors = Doctor::where('college_id',auth()->user()->college_id)->get();
                return view('Admin.courses.show',compact('course','colleges','classrooms','sections','doctors'));
            }
         

        }else{
            return redirect()->back();
        }

    }

  
    public function edit($id)
    {                
    //   
    }

    public function update(CourseRequest $request, $id)
    {
     
        
        try {

            $course = Course::findOrFail($id);

            if (request()->hasFile('image')){
                $imagePath = public_path('courses/'.  $course->image_name);
                if(File::exists($imagePath)){
                    unlink($imagePath);
                }
                $fileName = time().'.'.$request->file('image')->extension();  
                $request->file('image')->move(public_path('courses'), $fileName); 
                } else {
                    $fileName =   $course->image_name;
                }


          

                $course->name = $request->name;
                $course->image_name = $fileName;
                $course->semester = $request->semester;
                $course->college_id = $request->college_id;
                $course->classroom_id = $request->classroom_id;
                $course->section_id = $request->section_id;
                $course->doctor_id = $request->doctor_id;
             $course->save();
            Session::flash('message', 'Udpate Success'); 
       
            return redirect()->route('course.index');
        }

        catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }



    }


    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        Session::flash('message', 'Delete Success');
        return redirect()->route('course.index');
    }
}
