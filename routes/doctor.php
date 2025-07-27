<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Doctor\AttendanceController;

use App\Http\Controllers\Auth\DoctorController;

use App\Http\Controllers\Doctor\QuizzeController;

use App\Http\Controllers\Doctor\QuestionController;
use App\Http\Controllers\Doctor\LibraryController;
use App\Http\Controllers\Doctor\{DoctorCollegeController , LectureController , TotalDegreeController,AssignmentController,StudentAssignmentController,OnlineCourseController , OnlineCourseDirectController , CourseController};
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AjaxController;

/*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('dashboard/doctor', function () {
    return view('dashboard_doctor.index');
})->middleware(['auth:doctor'])->name('dashboard.doctor');



    Route::group(['middleware' => 'auth:doctor'], function(){
    Route::resource('quizzes',QuizzeController::class);
    Route::resource('questions',QuestionController::class);

    Route::controller(DoctorCollegeController::class)->group(function() {  
             Route::get('my_class','index');
    });

    
   Route::resource('attendance',AttendanceController::class);


   Route::get('attendance_report',[AttendanceController::class , 'attendanceReport'])->name('attendance.report');
   Route::post('attendance_report',[AttendanceController::class , 'attendanceSearch'])->name('attendance.search');

 
   Route::get('report_student_search/{id}',[AjaxController::class , 'report_student']);
    




   Route::get('lecturedoctor/{id}',[CourseController::class , 'lecturedoctor'])->name("lecturedoctor");
   Route::get('lecturedoctorcourse',[CourseController::class , 'courses'])->name('lecturedoctorcourse');   
   Route::get('lecturecreate/{id}',[LectureController::class , 'lecturecreate'])->name('lecturecreate');   
   Route::resource('lecture',LectureController::class);

   Route::resource('onlinecourse',OnlineCourseController::class);
   Route::resource('onlinecoursedirect',OnlineCourseDirectController::class);
   Route::resource('assignments',AssignmentController::class);

   Route::post(' repeat_quizze/{id}',[QuizzeController::class , 'repeatquiz']);

   Route::get('student_quizze/{id}',[QuizzeController::class,'student_quizze'])->name('student.quizze');

   Route::post('repeat_quizze', [QuizzeController::class,'repeat_quizze'])->name('repeat.quizze');

// Total Degree Quiz 
   Route::controller(TotalDegreeController::class)->group(function() {  
     Route::get('total_degree','index')->name('total_degree');
     Route::get('viewdegree/{student_id}/{course_id}','viewdegree');
     Route::get('viewstudentincourse/{course_id}','show')->name('viewstudentincourse');
});

   Route::controller(StudentAssignmentController::class)->group(function() {  
     Route::get('studentassignment','index');
     Route::get('viewastudentssignment/{student_id}/{course_id}','viewastudentssignment');
     Route::get('pdfstudentassignment/{viewassignment_id}/{course_id}','pdfstudentassignment');
     Route::get('assignmentstudentincourse/{course_id}','show')->name('assignmentstudentincourse');
     Route::get('show_pdf_student/{viewassignment_id}/{course_id}','show_pdf_student');
     Route::post('degreeassignment','degreestudentassignment');
});



});







// /////////////////////////////////////// logout student /////////////////////////////////////////////////////////////////
Route::post('logout/doctor', [DoctorController::class, 'destroy'])->middleware('auth:doctor')->name('doctor.logout');
//#############################################################################################
require __DIR__.'/auth.php';