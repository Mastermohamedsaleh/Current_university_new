<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\College;
use App\Models\Doctor;
use App\Models\StudySchedule;

use App\Http\Requests\StudyScheduleRequest;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;



class StudyScheduleController extends Controller
{


    public function index()
    {

        if(auth()->user()->status == 0){ 
            $colleges = College::all();
         }else{
            $colleges = College::where('id',auth()->user()->college_id)->get();
        }
     
        return view('Admin.studyschedule.index',compact('colleges'));
    }

 
    public function create()
    {

        if(auth()->user()->status == 0){  
            $colleges = College::all();
            $doctors = Doctor::all();
        }else{
            $colleges = College::where('id',auth()->user()->college_id)->get();
            $doctors = Doctor::where('college_id',auth()->user()->college_id)->get();
        }

        return view('Admin.studyschedule.add',compact('colleges','doctors'));
    }


    public function store( StudyScheduleRequest $request)
    {

        // StudyScheduleRequest
        try{  
            $course_id = $request->course_id;
 
            if(  $course_id == NULL) {
                Session::flash('danger', 'Add name Course'); 
                return redirect()->back();
            }

            $college_id = $request->college_id;
            $classroom_id = $request->classroom_id ;
            $section_id = $request->section_id ;
            $doctor_id = $request->doctor_id ;
            $course_day = $request->course_day ;
            $start_time = $request->start_time ;
            $end_time = $request->end_time ;
        
            for($i =0 ; $i < count($course_id) ; $i++){
              $insert = [
                  'course_id'=>$course_id[$i],
                  'start_time'=>$start_time[$i],
                  'end_time'=>$end_time[$i],
                  'doctor_id'=>$doctor_id[$i],
                  'course_day'=>$course_day[$i],
                  'college_id'=>$college_id,
                  'classroom_id'=>$classroom_id,
                  'section_id'=>$section_id,
                  'year' => $request->year,
                  'semester'=> $request->semester,
                  'location'=>$request->location,
              ];
             DB::table('study_schedules')->insert($insert); 
          }
            Session::flash('message', 'Add Success');
            return redirect()->route('studyschedule.index');
          }catch (\Exception $e){    
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }


    public function show(Request $request  , $id)
    {
        $request->validate([
            'college_id' => 'required',
            'classroom_id' => 'required',
            'year' => 'required',
            'semester' => 'required',
        ]);

       if( $request->college_id && $request->classroom_id && $request->section_id && $request->year && $request->semester ){
        if(auth()->user()->status == 0) {
         $studyschedule =   StudySchedule::where('college_id', $request->college_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->where('year',$request->year)->where('semester',$request->semester)->get();
         $colleges = College::all();
         return view('Admin.studyschedule.index',compact('studyschedule','colleges'));
        }else{
            if( auth()->user()->college_id != $request->college_id ){
                return redirect()->back();
             }else{
                 $studyschedule =   StudySchedule::where('college_id', $request->college_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->where('year',$request->year)->where('semester',$request->semester)->get();
                 $colleges = College::where('id',auth()->user()->college_id)->get();
                    return view('Admin.studyschedule.index',compact('studyschedule','colleges'));
             }
        }
       }elseif($request->college_id && $request->classroom_id && $request->year && $request->semester ){


        if(auth()->user()->status == 0) { 
            $studyschedule = StudySchedule::where('college_id', $request->college_id)->where('classroom_id',$request->classroom_id)->where('year',$request->year)->where('semester',$request->semester)->get();
            $colleges = College::all();
            return view('Admin.studyschedule.index',compact('studyschedule','colleges'));
        }else{
            if( auth()->user()->college_id != $request->college_id ){
                return redirect()->back();
             }else{
                 $studyschedule = StudySchedule::where('college_id', $request->college_id)->where('classroom_id',$request->classroom_id)->where('year',$request->year)->where('semester',$request->semester)->get();
                 $colleges = College::where('id',auth()->user()->college_id)->get();
                 return view('Admin.studyschedule.index',compact('studyschedule','colleges'));
             }     
       
        }
    }else{
        return redirect()->back(); 
       }

   
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        try{
            $studyschedule  = StudySchedule::findOrfail($id);
            $studyschedule->course_day = $request->course_day;
            $studyschedule->start_time = $request->start_time;
            $studyschedule->end_time = $request->end_time;
            $studyschedule->save();  
            Session::flash('message', 'Update Success');
            return redirect()->back(); 
        }catch (\Exception $e){    
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

 
    public function destroy($id)
    {
        $studyschedule = StudySchedule::findOrFail($id)->delete();
        Session::flash('message', 'Delete Success');
        return redirect()->back();
    }
}
