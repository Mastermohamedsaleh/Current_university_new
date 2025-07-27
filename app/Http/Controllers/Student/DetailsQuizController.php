<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Quizze;

use Illuminate\Support\Facades\Auth;

use App\Models\Degree;
use App\Models\AnswerStudent;



class DetailsQuizController extends Controller
{
    
     public function index($quizze_id){
  
          $quizze = Quizze::where('id',$quizze_id)->where('college_id',  Auth::guard('student')->user()->college_id)
          ->where('classroom_id',    Auth::guard('student')->user()->classroom_id)
          ->where('section_id', Auth::guard('student')->user()->section_id)
          ->first();
    if($quizze){
     $answerstudent = AnswerStudent::where('quizze_id',$quizze_id)->where('student_id',auth()->user()->id)->get();
     $degree = Degree::where('quizze_id',$quizze_id)->where('student_id',auth()->user()->id)->first();
     return view('Student.quizzes.details',compact('answerstudent','degree'));
    }else{
     return redirect()->back();
    }

  
     }
     
}
