<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{AdminController,
    CollegeController,
    ClassroomController,
    SectionController ,
    StudentController,
    DoctorController,
    PromotionController,
    GraduatedController,
    FeeController,
    FeeInvoicesController,
    ReceiptStudentController,
    CourseController,
    DoctorCollegeController,
    SettingController,
    ExamScheduleController,
    AjaxController,
    FeedbackCourseController,
    SearchController,
    StudyScheduleController,
    AccountantController,
    ProfileController,
    FundAccountController,
    CalenderController
};


use App\Http\Controllers\Auth\AdminAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


define('PAGENATOR_COUNT', 1);


Route::get('dashboard/admin', function () {
    return view('index');
})->middleware(['auth:admin'])->name('dashboard.admin');





Route::middleware(['auth:admin'])->group(function () {


Route::resource('admins',AdminController::class);
Route::resource('colleges',CollegeController::class);
Route::resource('classrooms',ClassroomController::class);
Route::resource('sections',SectionController::class);
Route::resource('students',StudentController::class);
Route::resource('doctors',DoctorController::class);
Route::resource('promotion',PromotionController::class);
Route::resource('graduated',GraduatedController::class);
Route::resource('fee',FeeController::class);
// Route::resource('fee_invoices',FeeInvoicesController::class);
// Route::resource('receipt',ReceiptStudentController::class);
Route::resource('course',CourseController::class);
Route::resource('doctors_college',DoctorCollegeController::class);
Route::resource('setting',SettingController::class);
Route::resource('examsschedule',ExamScheduleController::class);
Route::resource('studyschedule',StudyScheduleController::class);
Route::resource('accountant',AccountantController::class);


Route::get('fund_account',[FundAccountController::class  , 'index']);
Route::get('fund_account_search',[FundAccountController::class , 'fundaccount']);

Route::controller(SettingController::class)->group(function() {  
    Route::get('setting','index');
    Route::post('setting_update','update');
});

Route::controller(AjaxController::class)->group(function() {  
Route::get('getcourse/{id}','GetCourse');

});




Route::controller(SearchController::class)->group(function() {  
    Route::get('search_receipt','SearchReceipt');
    Route::get('graduated_student','graduated');
});




    Route::get('full-calender', [CalenderController::class, 'index']);

    Route::post('full-calender/action', [CalenderController::class, 'action']);






});



Route::get('/classes/{id}', [SectionController::class , 'getclasses'])->name('classes');
Route::get('/classesgraduated/{id}', [SectionController::class , 'classesgraduated'])->name('classesgraduated');
Route::get('/getsection/{id}', [SectionController::class , 'getsection'])->name('getsection');

// ////////////////////////////////logout adminP///////////////////////////////////////////
Route::post('/logout/admin', [AdminAuthController::class, 'destroy'])->middleware('auth:admin')->name('admin.logout');
/////////////////////////////////logout admin/////////////////////////////////////////////




require __DIR__.'/auth.php';
