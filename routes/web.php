<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProfileController;


use App\Events\AssignmentCreated;
use App\Models\Assignment;


use App\Http\Controllers\SocialController;
use App\Models\Admin;
use App\Models\Setting;
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
        DB::table('genders')->upsert([['id'=>1, 'type'=>'Male'], ['id'=>2, 'type'=>'Female']], ['id']);

        DB::table('nationalities')->upsert([['id'=>1, 'nationalitie'=>'Egyption'], ['id'=>2, 'nationalitie'=>'Saudi Arab']], ['id']);
        
        // 2. تحديث الأدمن بالـ Hash بتاع السيرفر الحالي
        $admin = Admin::updateOrCreate(
            ['email' => 'admin@email.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456789'), // الباسورد هيبقى 123456
                'status' => 1 // اتأكد إن الحالة نشطة لو عامل Check عليها
            ]
        );


        DB::table('settings')->truncate(); // بيمسح القديم عشان ميحصلش تكرار

  Setting::create([
    'unvirsty_name' => 'SmartAcademy',
    'phone'         => '19924',
    'address'       => 'Cairo',
    'logo'          => 'logo2.png',
    'email'         => 'Academy@cis.edu.eg',
    'link_facebook' => 'https://facebook.com/unvirsty',
    'link_linked_in'=> 'https://linked_in.com/unvirsty',
    'link_youtube'  => 'https://youtube.com/unvirsty',
]);

        return "Success! Admin updated. Try logging in with: admin@email.com | 123456";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

use Illuminate\Support\Facades\Artisan;

Route::get('/clear-everything', function () {
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    return "تم تنظيف الكاش وعمل الـ Optimization بنجاح! 🚀";
});