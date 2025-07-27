<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Question;
use App\Models\Quizze;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Option;



class QuestionController extends Controller
{
    public function index()
    {
        //  
    }


    public function create()
    {
       //  
    }


    public function store(QuestionRequest $request)
    {
        try {  


            $quizz = Quizze::where('id', $request->quizz_id)->where('doctor_id',auth()->user()->id)->first(); 
          

            if( $quizz->type_quiz  == 0 ){
                $typequestion = $request->typequestion;
                if($typequestion == 'trueorfale'){
                  $trimmed = trim($request->answers);
      
      
              
                  $numWords = count(explode('-', $trimmed));
                  if($numWords == 2){
                      $question = new Question();
                      $question->title = $request->title;
                      $question->answers =   $trimmed;
                      $question->right_answer = $request->right_answer;
                      $question->score = $request->score;
                      $question->quizze_id =  $request->quizz_id;
                      $question->save();
      
                      $answer = preg_split('/(-)/', $trimmed);
      
                      for($i = 0 ; $i < count($answer) ; $i++){
                       $insert = [
                           'question_id' => $question->id,
                           'option_text'=>$answer[$i],
                           'points'=>$request->score,
                         ];
                   DB::table('options')->insert($insert);
                   } 
                     
      
      
                      Session::flash('message', 'Add Success');
                      return redirect()->back();
      
                  }else{
                      Session::flash('error', 'Only 1 Sparate between String Please Use -');
                      return redirect()->back();
                  }
                }else{
                  $trimmed = trim($request->answers);
                  $numWords = count(explode('-', $trimmed));
                  if($numWords == 3){
                      $question = new Question();
                      $question->title = $request->title;
                      $question->answers =   $trimmed;
                      $question->right_answer = $request->right_answer;
                      $question->score = $request->score;
                      $question->quizze_id =  $request->quizz_id;
                      $question->save();
      
      
                      $answer = preg_split('/(-)/', $trimmed);
      
                      for($i = 0 ; $i < count($answer) ; $i++){
                       $insert = [
                           'question_id' => $question->id,
                           'option_text'=>$answer[$i],
                           'points'=>$request->score,
                         ];
                   DB::table('options')->insert($insert);
                   } 
                     
      
      
                      Session::flash('message', 'Add Success');
                      return redirect()->back();
                  }else{
                      Session::flash('error', 'Only 2 Sparate between String Please Use -');
                      return redirect()->back();
                  }
                }  
      
           }else{

         



        




          $typequestion = $request->typequestion;
          if($typequestion == 'trueorfale'){
            $trimmed = trim($request->answers);
            $numWords = count(explode('-', $trimmed));
            if($numWords == 2){
                $question = new Question();
                $question->title = $request->title;
                $question->answers =   $trimmed;
                $question->right_answer = $request->right_answer;
                $question->score = $request->score;
                $question->quizze_id =  $request->quizz_id;
                $question->save();
                Session::flash('message', 'Add Success');
                return redirect()->back();

            }else{
                Session::flash('error', 'Only 1 Sparate between String Please Use -');
                return redirect()->back();
            }
          }else{
            $trimmed = trim($request->answers);
            $numWords = count(explode('-', $trimmed));
            if($numWords == 3){
                $question = new Question();
                $question->title = $request->title;
                $question->answers =   $trimmed;
                $question->right_answer = $request->right_answer;
                $question->score = $request->score;
                $question->quizze_id =  $request->quizz_id;
                $question->save();
                Session::flash('message', 'Add Success');
                return redirect()->back();
          
            }else{
                Session::flash('error', 'Only 2 Sparate between String Please Use -');
                return redirect()->back();
            }
          }  
        }  //end type Quiz
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function show($id)
    {
        $quizz = Quizze::where('id', $id)->where('doctor_id',auth()->user()->id)->first(); 
        if($quizz){
            return view('Doctor.Questions.create', compact('quizz'));
        }else{
            return redirect()->back(); 
        }
    }

    public function edit($id)
    {
        $question = Question::findorfail($id);
        $quizzes = Quizze::get();
        return view('Doctors.Questions.edit',compact('question','quizzes'));
    }

    
    public function update(Request $request, $id)
    {
        try {
            $question = Question::findorfail($request->id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            Session::flash('message', 'Update Success');
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request,$id)
    {
        try {
            Question::destroy($request->id);
            Session::flash('message', 'Delete Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
