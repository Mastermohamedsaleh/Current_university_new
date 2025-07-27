<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\ExamSchedule;
use App\Models\StudySchedule;

class ScheduleController extends Controller
{
    
    public function examschedule(){
        $examschedule = ExamSchedule::where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id',  Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)->get();

        return view('Student.schedule.examschedule',compact('examschedule'));
    }
      
    public function studyschedule(){
        $studyschedule = StudySchedule::where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id',  Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)->get();

        return view('Student.schedule.studyschedule',compact('studyschedule'));
    }
      
}
