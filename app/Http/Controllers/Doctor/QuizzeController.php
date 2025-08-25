<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Quizze;
use App\Models\Question;
use App\Models\Course;      // Change All Course Into Course
use App\Models\Doctor;
use App\Models\Degree;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\QuizRequest;
use Illuminate\Support\Facades\DB;
use App\Services\QuizzeService;



class QuizzeController extends Controller
{


        public function __construct(
        protected QuizzeService $quizzeService
    ) {}



    public function index()
    {
        $quizzes = Quizze::where('doctor_id',auth()->user()->id)->get();
        return view('Doctor.Quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $data['courses'] = Course::where('doctor_id',auth()->user()->id)->get();
        return view('Doctor.Quizzes.create', $data);
    }

    public function store(QuizRequest $request)
    {
        
              try {
            $this->quizzeService->createQuiz($request->all());
            Session::flash('message', 'Add Success');
            return redirect()->route('quizzes.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

    

    }

    public function show($id)
    {
        $quizz = Quizze::where('id',$id)->where('doctor_id',auth()->user()->id)->first();
        if($quizz){
        $questions = Question::where('quizze_id',$id)->get();
        return view('Doctor.Questions.index',compact('questions','quizz'));
        }else{
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $quizz = Quizze::findorFail($id);
        $data['colleges'] = College::all();
        $data['courses'] =  Course::where('doctor_id',auth()->user()->id)->get();
        $data['doctors'] = Doctor::all();
        return view('Doctor.Quizzes.edit', $data, compact('quizz'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->quizzeService->updateQuiz($id, $request->all());
            Session::flash('message', 'Update Success');
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request ,$id)
    {
       try {
            $this->quizzeService->deleteQuiz($id);
            Session::flash('message', 'Delete Success');
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // Degree of quizze
    public function student_quizze($quizze_id)
    {
         $degrees = $this->quizzeService->getQuizDegrees($quizze_id);

        if (!$degrees) return back();

        return view('Doctor.Quizzes.student_quizze', compact('degrees'));
    }



    // return quizze to one student
     public function  repeatquiz(Request $request ,$id){
        $request->validate([
            'start_time' => 'required',
            'end_time'   => 'required',
        ]);

        try {
            $this->quizzeService->repeatQuiz($request->all());
            Session::flash('message', 'Repeat Success');
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
