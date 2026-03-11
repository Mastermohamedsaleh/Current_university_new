<?php

namespace App\Services;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Quizze;
use App\Models\Option;
use App\Models\Question; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuestionService
{
    protected $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    } 



    public function  EasyQuizze(array $data, Quizze $quiz)
    {
                $typequestion = $data['typequestion'];
                if($typequestion == 'trueorfale'){
                  $answers = explode('-', trim($data['answers']));
                  $numWords = count($answers);
                  if($numWords == 2){
            $questionData = [
            'title'        => $data['title'],
            'answers'      => implode('-', $answers),
            'right_answer' => $data['right_answer'],
            'score'        => $data['score'],
            'quizze_id'    => $data['quizz_id'],
        ];

    
         $question = $this->questionRepository->create($questionData);
      
                    
        

              for($i = 0 ; $i < count($answers) ; $i++){
               $insert = [
                   'question_id' => $question->id,
                   'option_text'=>$$answers[$i],
                   'points'=>$data['score'],
                 ];
           DB::table('options')->insert($insert);
                   } 
                     
                      return $question;
                  }else{
                      Session::flash('error', 'Only 1 Sparate between String Please Use -');
                      return redirect()->back();
                  }
                }else{
               
                $answers = explode('-', trim($data['answers']));
                  $numWords = count($answers);
                  if($numWords == 3){
            $questionData = [
            'title'        => $data['title'],
            'answers'      => implode('-', $answers),
            'right_answer' => $data['right_answer'],
            'score'        => $data['score'],
            'quizze_id'    => $data['quizz_id'],
        ];

    
   $question = $this->questionRepository->create($questionData);
    
                     
      
                      for($i = 0 ; $i < count($answers) ; $i++){
                       $insert = [
                           'question_id' => $question->id,
                           'option_text'=>$$answers[$i],
                           'points'=>$data['score'],
                         ];
                   DB::table('options')->insert($insert);
                   } 
                     
                      return $question;
                  }else{
                      Session::flash('error', 'Only 2 Sparate between String Please Use -');
                      return redirect()->back();
                  }
                }  
      
    }


    public function  HardQuizze(array $data, Quizze $quiz) 
    {
       $typequestion = $data['typequestion'];
          if($typequestion == 'trueorfale'){
            $answers = explode('-', trim($data['answers']));
            $numWords = count($answers);
            if($numWords == 2){
                $question = new Question();
            $questionData = [
            'title'        => $data['title'],
            'answers'      => implode('-', $answers),
            'right_answer' => $data['right_answer'],
            'score'        => $data['score'],
            'quizze_id'    => $data['quizz_id'],
        ];

       
        return $this->questionRepository->create($questionData);

            }else{
                Session::flash('error', 'Only 1 Sparate between String Please Use -');
                return redirect()->back();
            }
          }else{
                        $answers = explode('-', trim($data['answers']));
            $numWords = count($answers);
            if($numWords == 3){

            $questionData = [
            'title'        => $data['title'],
            'answers'      => implode('-', $answers),
            'right_answer' => $data['right_answer'],
            'score'        => $data['score'],
            'quizze_id'    => $data['quizz_id'],
        ];

       
        return $this->questionRepository->create($questionData);




          
            }else{
                Session::flash('error', 'Only 2 Sparate between String Please Use -');
                return redirect()->back();
            }
          }  
    }


public function create(array $data): Question 
{
    $quizz = Quizze::where('id', $data['quizz_id'])
        ->where('doctor_id', auth()->user()->id)
        ->first();

    if (!$quizz) {
        throw new \Exception("Quiz not found or not authorized");
    }

    if ($quizz->type_quiz == 0) {
        return $this->EasyQuizze($data, $quizz);
    }

    return $this->HardQuizze($data, $quizz);
}


}