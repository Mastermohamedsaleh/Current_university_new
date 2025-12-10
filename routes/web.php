<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProfileController;


use App\Events\AssignmentCreated;
use App\Models\Assignment;


use App\Http\Controllers\SocialController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {

    return view('welcome');
});


Route::get('about', function () {
    return view('about');
});

Route::get('test', function () {



$assignment =   Assignment::create([
    'name'=>'m',
    'course_id'=>1,
    'college_id'=>1,
    'classroom_id'=>1,
    'start_time'=> '2025-10-08 17:04:00',
    'end_time'=>'2025-10-08 18:04:00',
    'file_name'=>'1759932270.pdf',
    'degree'=>5,
    'doctor_id'=>1,
]);



      return event(new AssignmentCreated($assignment));
       
});

Route::get('fields', function () {
    return view('fields');
});


Route::get('contact_us', function () {
    return view('contactus');
});


Route::get('event', function () {
    return view('events');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::post('/change-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('update-password');



Route::controller(ProfileController::class)->group(function() {  
    Route::get('adminprofile','profile');
    Route::get('doctorprofile','doctorprofile');
    Route::get('studentprofile','studentprofile');
    Route::get('accountantprofile','accountantprofile');
    Route::post('updateprofile/{id}','updateprofile')->name('updateprofile');
});

