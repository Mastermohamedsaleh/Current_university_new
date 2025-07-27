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



class QuizzeController extends Controller
{
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
        
       $course = Course::where('id' , $request->course_id)->first();
        try {


            $quizzes = new Quizze();
            $quizzes->name = $request->name;
            $quizzes->course_id =  $request->course_id;
            $quizzes->college_id =  $course->college_id;
            $quizzes->classroom_id =  $course->classroom_id;
            $quizzes->section_id =  $course->section_id;
            $quizzes->start_time =  $request->start_time;
            $quizzes->end_time =  $request->end_time;
            $quizzes->type_quiz =  $request->type_quiz;
            $quizzes->doctor_id = auth()->user()->id;
            $quizzes->save();
            Session::flash('message', 'Add Success');
            return redirect()->route('quizzes.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
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
            $quizz = Quizze::findorFail($request->id);
            $quizzes->name = $request->name;
            $quizzes->course_id = $request->course_id;
            $quizzes->college_id = $request->college_id;
            $quizzes->classroom_id = $request->classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->doctor_id = auth()->user()->id;
            $quizz->save();
            Session::flash('message', 'Update Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request ,$id)
    {
        try {
            Quizze::destroy($request->id);
            Session::flash('message', 'Delete Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function student_quizze($quizze_id)
    {
        $quizz = Quizze::where('id',$quizze_id)->where('doctor_id',auth()->user()->id)->first();
        if( $quizz ){
            if($quizz->id == $quizze_id){
                $degrees = Degree::where('quizze_id', $quizze_id)->get();
                return view('Doctor.Quizzes.student_quizze', compact('degrees'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

     public function  repeatquiz(Request $request ,$id){
        $validated = $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $student  = Student::where('id',$request->student_id)->first();
        DB::table('special_quizzes')->insert([
          'quizze_id'=>$request->quizze_id,
          'student_id'=>$request->student_id,
          'college_id'=>$student->college_id,
          'classroom_id'=>$student->classroom_id,
          'section_id'=>$student->section_id,
          'course_id'=>$request->course_id,
          'start_time'=>$request->start_time,
          'end_time'=>$request->end_time,
        ]);

        Degree::where('student_id',$request->student_id)->where('quizze_id',$request->quizze_id)->delete();
        Session::flash('message', 'Repeat Success');
        return redirect()->back();       
    } 

}
