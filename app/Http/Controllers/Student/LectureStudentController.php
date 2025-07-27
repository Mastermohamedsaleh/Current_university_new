<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Lecture;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;


class LectureStudentController extends Controller
{
    


    public function courses(){

        $courses = Course::where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id',    Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)
        ->orderBy('id', 'DESC')
        ->get();

        return view('Student.Lecture.courses',compact('courses'));
    }


    public function LectureStudent(Request $request, $id){

        $courses = Course::where('id',$id)->where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id',    Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)
        ->first();
if( $courses){
    $search = $request->input('search');          
    if ($search) {  
        $lectures = Lecture::where('course_id',$id)->where('title', 'like', "%$search%")->where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id',  Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)
        ->orderBy('id', 'DESC')->paginate(PAGENATOR_COUNT);
    }else{
        $lectures = Lecture::where('course_id',$id)->where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id',  Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)
        ->orderBy('id', 'DESC')->paginate(PAGENATOR_COUNT); 
    }  
    if( $lectures){
    return view('Student.Lecture.index',compact('lectures','id'));
    }else{
        return redirect()->back();
    }

}else{
    return redirect()->back();

}



    }

    public function ViewLecture($lecture_id){

        // Library::findorFail($library_id);
        $lecture = Lecture::where('id',$lecture_id)->where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id',  Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)->first();
        if($lecture){
           $file_name =  $lecture->file_name;
           return view('Student.Lecture.show',compact('file_name'));
        }else{
            return redirect()->back();
        }
         
    }



}
