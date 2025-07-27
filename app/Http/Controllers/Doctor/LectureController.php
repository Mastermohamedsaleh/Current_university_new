<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Course;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LectureRequest;
use Illuminate\Support\Facades\Auth;
use File;

class LectureController extends Controller
{




    public function index(Request $request)  
     {
        $search = $request->input('search');          
        if ($search) {  
             $lectures = Lecture::where('title', 'like', "%$search%")->get();
        }else{
            $lectures = Lecture::where('doctor_id',auth()->user()->id)->orderBy('id', 'DESC')->get();  
        }      
        // $lectures = Lecture::where('doctor_id',auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('Doctor.My_lecture.index',compact('lectures'));
    }


    public function create()
    {

    }

    public function lecturecreate($course_id){
           return view('Doctor.My_lecture.create',compact('course_id'));
    }

    public function store(Request $request)
    {

try{
    $course = Course::where('id' , $request->course_id)->where('doctor_id',auth()->user()->id)->first();

    $course_id = $course->id; 
    if($course){
        $fileName = time().'.'.$request->file('file_name')->extension();  
        $request->file('file_name')->move(public_path('Lecture_Doctor'), $fileName);
        $lecture = new Lecture();
        $lecture->title = $request->title;
        $lecture->file_name =   $fileName;
        $lecture->doctor_id =  auth()->user()->id;
        $lecture->course_id =  $request->course_id;
        $lecture->college_id =  $course->college_id;
        $lecture->classroom_id =  $course->classroom_id;
        $lecture->section_id =  $course->section_id;
        $lecture->save();
        Session::flash('message', 'Add Success');
        return redirect()->route('lecturedoctor',$course_id);
    }else{
        return redirect()->route('lecturedoctorcourse');

    }


      


    } catch (\Exception $e) {
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }


    public function show($id)
    {
        $lecture =  Lecture::where('id',$id)->where('doctor_id',auth()->user()->id)->first();
        if( $lecture ){
         return view('Doctor.My_lecture.show',compact('lecture'));
        }else{
        return redirect()->back();
        }
    }


    public function edit($id)
    {
        $lecture =  Lecture::where('id',$id)->where('doctor_id',auth()->user()->id)->first();
       if( $lecture ){
        $courses = Course::where('doctor_id',auth()->user()->id)->get();
        return view('Doctor.My_lecture.edit',compact('courses','lecture'));
       }else{
       return redirect()->back();
       }

    }

  
    public function update(LectureRequest $request, $id)
    {
   
        try{

         $course = Course::where('id' , $request->course_id)->first();     
         $lecture = Lecture::findOrfail($id);         
        if (request()->hasFile('file_name')){
            $file_name = public_path('Lecture_Doctor/'.$lecture->file_name);
            if(File::exists($file_name)){
                unlink($file_name);
            }
            $file_name = time().'.'.$request->file('file_name')->extension();  
            $request->file('file_name')->move(public_path('Lecture_Doctor'), $file_name); 
            } else {
                $file_name = $lecture->file_name;
            }

            $lecture->title = $request->title;
            $lecture->file_name =   $file_name;
            $lecture->doctor_id =  auth()->user()->id;
            $lecture->course_id =  $request->course_id;
            $lecture->college_id =  $course->college_id;
            $lecture->classroom_id =  $course->classroom_id;
            $lecture->section_id =  $course->section_id;
            $lecture->save();
            Session::flash('message', 'Update Success');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }



    }


    public function destroy($id)
    {
  
        $lecture = Lecture::findOrFail($id);
        $Lecture_path = public_path("Lecture_Doctor/{$lecture->file_name}");
    
        if (File::exists($Lecture_path)) {
            File::delete($Lecture_path);
            // unlink($image_path);
        }
        $lecture->delete();
        Session::flash('message', 'Delete Success');
        return redirect()->route('lecture.index');


    }






}
