<?php

namespace App\Http\Controllers;
use App\Models\ExamSchedule;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ExamScheduleRequest;

class ExamScheduleController extends Controller
{
  
    public function index()
    {

        if(auth()->user()->status == 0) {  
            $colleges = College::all();
        }else{
            $colleges = College::where('id',auth()->user()->college_id)->get();
        }

        return view('Admin.examschedule.index',compact('colleges'));
    }

 
    public function create()
    {

        if(auth()->user()->status == 0) {   
            $colleges = College::all();
        }else{
            $colleges = College::where('id',auth()->user()->college_id)->get();
        }
        return view('Admin.examschedule.add',compact('colleges'));
    }

 
    public function store(ExamScheduleRequest $request)
    {
        


    try{  
      $course_id = $request->course_id;
      $college_id = $request->college_id;
      $classroom_id = $request->classroom_id ;
      $section_id = $request->section_id ;
      $exam_date = $request->exam_date ;
      $start_time = $request->start_time ;
      $end_time = $request->end_time ;
    
      for($i =0 ; $i < count($course_id) ; $i++){
        $insert = [
            'course_id'=>$course_id[$i],
            'exam_date' =>$exam_date[$i],
            'start_time' =>$start_time[$i],
            'end_time' =>$end_time[$i],
            'college_id'=>$college_id,
            'classroom_id'=>$classroom_id,
            'section_id'=>$section_id,
            'year'=>$request->year,
            'semester'=>$request->semester,

         
        ];
       DB::table('exam_schedules')->insert($insert); 
    }
      Session::flash('message', 'Add Success');
      return redirect()->route('examsschedule.index');

    }catch (\Exception $e){    
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

}


    public function show(ExamSchedule $examSchedule , Request $request)
    {
 
        $request->validate([
            'college_id' => 'required',
            'classroom_id' => 'required',
            'year' => 'required',
            'semester' => 'required',
        ]);

       if( $request->college_id && $request->classroom_id && $request->section_id && $request->year && $request->semester ){


        if(auth()->user()->status == 0) {  
            $examschedule =   ExamSchedule::where('college_id', $request->college_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->where('year',$request->year)->where('semester',$request->semester)->get();
            $colleges = College::all();
            return view('Admin.examschedule.index',compact('examschedule','colleges'));
        }else{
            if( auth()->user()->college_id != $request->college_id ){
                return redirect()->back();
             }else{
                 $examschedule =   ExamSchedule::where('college_id', $request->college_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->where('year',$request->year)->where('semester',$request->semester)->get();
                 $colleges = College::where('id',auth()->user()->college_id)->get();
                    return view('Admin.examschedule.index',compact('examschedule','colleges'));
             }
        }          


      
       }elseif($request->college_id && $request->classroom_id && $request->year && $request->semester ){

        if(auth()->user()->status == 0) {  
            $examschedule = ExamSchedule::where('college_id', $request->college_id)->where('classroom_id',$request->classroom_id)->where('year',$request->year)->where('semester',$request->semester)->get();
            $colleges = College::all();
            return view('Admin.examschedule.index',compact('examschedule','colleges'));
            }else{
                if( auth()->user()->college_id != $request->college_id ){
                    return redirect()->back();
                 }else{
                     $examschedule = ExamSchedule::where('college_id', $request->college_id)->where('classroom_id',$request->classroom_id)->where('year',$request->year)->where('semester',$request->semester)->get();
                     $colleges = College::where('id',auth()->user()->college_id)->get();
                     return view('Admin.examschedule.index',compact('examschedule','colleges'));
                 }
            }
       }else{
        return redirect()->back(); 
       }
    

    }

 
    public function edit(ExamSchedule $examSchedule)
    {
        //
    }

  
    public function update(Request $request,$id)
    {
        try{
        $examschedule  = ExamSchedule::findOrfail($id);
        $examschedule->exam_date = $request->exam_date;
        $examschedule->start_time = $request->start_time;
        $examschedule->end_time = $request->end_time;
        $examschedule->save();  
        Session::flash('message', 'Update Success');
        return redirect()->back(); 
    }catch (\Exception $e){    
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
          
    }

 
    public function destroy(ExamSchedule $examSchedule , $id)
    {
        $examSchedule = ExamSchedule::findOrFail($id)->delete();
        Session::flash('message', 'Delete Success');
        return redirect()->back();
    }




    // public function showschedule($college_id , $classroom_id){
    //     $examschedule  = ExamSchedule::where('college_id',$college_id)->where('classroom_id',$classroom_id)->get();
    //     return view('Admin.examschedule.show',compact('examschedule'));
    // }


}
