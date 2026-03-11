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
use App\Services\QuestionService;



class QuestionController extends Controller
{



        protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }


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
            $this->questionService->create($request->all());
            Session::flash('message', 'Add Success');
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
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
