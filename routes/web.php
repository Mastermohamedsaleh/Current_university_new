<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProfileController;


use App\Events\AssignmentCreated;
use App\Models\Assignment;


use App\Http\Controllers\SocialController;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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





Route::get('/force-login', function () {
    try {
        // 1. تنظيف وتنزيل الداتا الأساسية غصب عن أي Seeder
        DB::table('genders')->upsert([['id'=>1, 'name'=>'Male'], ['id'=>2, 'name'=>'Female']], ['id']);
        
        // 2. تحديث الأدمن بالـ Hash بتاع السيرفر الحالي
        $admin = Admin::updateOrCreate(
            ['email' => 'admin@email.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456789'), // الباسورد هيبقى 123456
                'status' => 1 // اتأكد إن الحالة نشطة لو عامل Check عليها
            ]
        );

        return "Success! Admin updated. Try logging in with: admin@email.com | 123456";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});