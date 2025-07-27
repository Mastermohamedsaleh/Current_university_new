<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\StudentController;

use App\Http\Controllers\Student\QuizController;
use App\Http\Controllers\Student\ExamScheduleStudentController;  
use App\Http\Controllers\Student\FeeController;  
use App\Http\Controllers\Student\LectureStudentController;  
use App\Http\Controllers\Student\ScheduleController;  
use App\Http\Controllers\Student\AssignmentController;  
use App\Http\Controllers\Student\SpecialQuizController;  
use App\Http\Controllers\Student\DetailsQuizController;  
use App\Http\Controllers\Student\OnlineCourseController;  
use App\Http\Controllers\CalenderController;  




// Route::get('dashboard/student', function () {
//     return view('dashboard_student.index');
// })->middleware(['auth:student'])->name('dashboard.student');

Route::middleware(['auth:student'])->group(function () { 


    Route::get('dashboard/student',[CalenderController::class, 'student']);


    Route::resource('student_quiz', QuizController::class);
    Route::get('student_online',[ OnlineCourseController::class  , 'index' ]);
    
    
    Route::controller(LectureStudentController::class)->group(function() {  
        
        Route::get('lecturestudentcourse', 'courses')->name('lecturestudentcourse');
        Route::get('lecturestudent/{id}', 'lecturestudent')->name('lecturestudent');
        Route::get('viewlecture/{id}', 'viewLecture')->name('viewlecture');
        
    
    
    });
    
    Route::get('special_quiz' , [SpecialQuizController::class , 'index'])->name('special_quiz');
    Route::get('viewspecialquiz/{quiz_id}' , [SpecialQuizController::class , 'show'])->name('viewspecialquiz');

        Route::controller(ScheduleController::class)->group(function() {  
        Route::get('search_receipt','SearchReceipt');
        });

       Route::controller(AssignmentController::class)->group(function() {  
           Route::get('view_assignment','index')->name('view_assignment');
           Route::get('show_assignment/{id}','show');
           Route::get('show_pdf/{id}','show_pdf');
           Route::post('uploadassignment/{course_id}','uploadassignment');
       });
    
    
    Route::controller(FeeController::class)->group(function() {   
        Route::get('fee_student', 'index');
        Route::get('details_fee_student', 'Details');
    });
    
    Route::get('Detailsquizanddedegree/{quizze_id}',[DetailsQuizController::class,'index']);
    
    Route::controller(ScheduleController::class)->group(function() {  
        Route::get('showexamschedule', 'examschedule');
        Route::get('showstudychedule', 'studyschedule');
    });
    
    Route::get('full-calender-student', [CalenderController::class, 'student']);





});




// /////////////////////////////////////// logout student /////////////////////////////////////////////////////////////////

Route::post('logout/student', [StudentController::class, 'destroy'])->middleware('auth:student')->name('student.logout');


//#############################################################################################




require __DIR__.'/auth.php';
