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
use App\Services\LectureService;

class LectureController extends Controller
{

    protected $lectureService;

    public function __construct(LectureService $lectureService)
    {
        $this->lectureService = $lectureService;
    }


    public function index(Request $request)  
     {
        $search = $request->input('search');          
        if ($search) {  
             $lectures = Lecture::where('title', 'like', "%$search%")->get();
        }else{
            $lectures = Lecture::where('doctor_id',auth()->user()->id)->orderBy('id', 'DESC')->get();  
        }      

        return view('Doctor.My_lecture.index',compact('lectures'));
    }

    public function lecturecreate($course_id){
           return view('Doctor.My_lecture.create',compact('course_id'));
    }

    public function store(Request $request)
    {
        try {
            $this->lectureService->create($request->all());
            Session::flash('message', 'Add Success');
            return redirect()->route('lecturedoctor', $request->course_id);
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

  
    public function update(int $id,LectureRequest $request)
    {
        try {
            $this->lectureService->update($id,$request->all());
            Session::flash('message', 'Update Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }



    }


    public function destroy($id)
    {
  
        $this->lectureService->delete($id);
        Session::flash('message', 'Delete Success');
        return redirect()->route('lecture.index');


    }






}
