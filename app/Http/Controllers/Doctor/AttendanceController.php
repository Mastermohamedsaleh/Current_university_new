<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Course;
use App\Models\Student;
use App\Models\Attendance;
use App\Http\Requests\AttendanceRequest;


class AttendanceController extends Controller
{

    public function index()
    {
        $courses_doctors = Course::where('doctor_id',auth()->user()->id)->get();
    //    $students = Student::where('college_id',$courses_doctors->college_id)->where('classroom_id',$courses_doctors->classroom_id)->where('section_id',$courses_doctors->section_id)->get();
        return view('Student.Attendance.index',compact('courses_doctors'));
    }


    public function create(Request $request)
    {
       $course = Course::where('id',$request->course_id)->first();

       $students = Student::where('college_id',$course->college_id)->where('classroom_id',$course->classroom_id)->where('section_id',$course->section_id)->get();
       $courses_doctors = Course::where('doctor_id',auth()->user()->id)->get();

       $course_id =$request->course_id;
       return view('Student.Attendance.index',compact('course_id','students','courses_doctors'));


 

    }


    public function store(AttendanceRequest $request)
    {
        try {

            $Attendence = date('Y-m-d');
            foreach ($request->attendences as $studentid => $attendence) {

                if( $attendence == 'presence' ) {
                    $attendence_status = true;
                } else if( $attendence == 'absent' ){
                    $attendence_status = false;
                }

                Attendance::updateorCreate(
                    [
                        'student_id'=>$studentid,
                        'attendence_date'=>$Attendence
                    ]
                ,[
                    'student_id'=> $studentid,
                    'college_id'=> $request->college_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'course_id'=> $request->course_id,
                    'doctor_id'=> auth()->user()->id,
                    'attendence_date'=> date('Y-m-d'),
                    'attendence_status'=> $attendence_status
                ]);

            }

            Session::flash('message', 'Submit Success');
            return redirect()->back();

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

  
    public function show($id)
    {
        

    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


   public function attendanceReport(){

  

          $courses_doctors = Course::where('doctor_id',auth()->user()->id)->get();
        return view('Student.Attendance.report',compact('courses_doctors'));

    }



    public function attendanceSearch(Request $request){

        $request->validate([
            'from'  =>'required|date|date_format:Y-m-d',
            'to'=> 'required|date|date_format:Y-m-d|after_or_equal:from'
        ],[
            'to.after_or_equal' => 'The end date must be greater than or equal to the start date ',
            'from.date_format' => 'yyyy-mm-dd',
            'to.date_format' => 'yyyy-mm-dd',
        ]);

   if($request->student_id == 0){
       $courses_doctors = Course::where('doctor_id',auth()->user()->id)->get();
       $course = Course::where('id',$request->course_id)->first();
       $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->where('course_id',$request->course_id)->where('course_id',$request->course_id)->get();
       return view('Student.Attendance.report',compact('courses_doctors','Students'));

   }

   else{
       $courses_doctors = Course::where('doctor_id',auth()->user()->id)->get();
       $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->where('course_id',$request->course_id)
       ->where('student_id',$request->student_id)->get();
       return view('Student.Attendance.report',compact('courses_doctors','Students'));

   }
    }

}
