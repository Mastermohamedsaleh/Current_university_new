<?php

namespace App\Services;

use App\Interfaces\QuizzeRepositoryInterface;
use App\Models\Course;
use App\Models\Question;
use App\Models\Degree;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizzeService
{
    
    

    public function __construct(
        protected QuizzeRepositoryInterface $quizzeRepository
    ) {}


    public function getDoctorQuizzes()
    {
        return $this->quizzeRepository->allQuizeByDoctor(Auth::id());
    }

        public function createQuiz(array $data)
    {
        $course = Course::findOrFail($data['course_id']);

        $quizData = [
        'name'         => $data['name'],
        'course_id'    => $course->id,
        'college_id'   => $course->college_id,
        'classroom_id' => $course->classroom_id,
        'section_id'   => $course->section_id,
        'start_time'   => $data['start_time'],
        'end_time'     => $data['end_time'],
        'type_quiz'    => $data['type_quiz'],
        'doctor_id'    => Auth::id(),
    ];

    return $this->quizzeRepository->create($quizData);
    }


     public function updateQuiz(int $id, array $data) 
     {
         $quiz = $this->quizzeRepository->findByIdAndDoctor($id, Auth::id());

        if (!$quiz) {
            throw new \Exception("Quiz not found or not authorized");
        }

           return $this->quizzeRepository->update($quiz, $data);

     }

    public function deleteQuiz(int $id)
    {
        return $this->quizzeRepository->delete($id);
    }


        public function getQuizDegrees(int $quizId)
    {
        $quiz = $this->quizzeRepository->findByIdAndDoctor($quizId, Auth::id());

        if (!$quiz) {
            return null;
        }

        return Degree::where('quizze_id', $quizId)->get();
    }

        public function repeatQuiz(array $data)
    {
        $student = Student::findOrFail($data['student_id']);

        DB::table('special_quizzes')->insert([
            'quizze_id'   => $data['quizze_id'],
            'student_id'  => $data['student_id'],
            'college_id'  => $student->college_id,
            'classroom_id'=> $student->classroom_id,
            'section_id'  => $student->section_id,
            'course_id'   => $data['course_id'],
            'start_time'  => $data['start_time'],
            'end_time'    => $data['end_time'],
        ]);

        Degree::where('student_id', $data['student_id'])
              ->where('quizze_id', $data['quizze_id'])
              ->delete();

        return true;
    }


}