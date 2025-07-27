<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Quizze;
use App\Models\SpecialQuiz;

use Illuminate\Support\Facades\DB;


class SpecialQuizController extends Controller
{
       
    public function  index(){
        $quizzes =  SpecialQuiz::where('student_id',Auth::guard('student')->user()->id)->where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id', Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)->get();
        return view('Student.special_quiz.index',compact('quizzes'));   
   }
         
   public function show($quizze_id){
       
    //  $quiz =  DB::table('special_quizzies')->where('student_id',Auth::guard('student')->user()->id)->where('quizze_id',$quiz_id)->get();
     $student_id = Auth::guard('student')->user()->id;
     return view('Student.quizzes.show',compact('quizze_id','student_id'));
   } 
      
}
