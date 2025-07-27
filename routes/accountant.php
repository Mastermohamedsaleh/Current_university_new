<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Auth\AccountantController;

use App\Http\Controllers\Accountant\StudentController;
use App\Http\Controllers\Accountant\FeeInvoicesController;
use App\Http\Controllers\Accountant\ReceiptStudentController;

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



// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('dashboard/accountant', function () {
    return view('dashboard_accountant.index');
})->middleware(['auth:accountant'])->name('dashboard.accountant');




Route::group(['middleware' => 'auth:accountant'], function(){ 

    Route::controller(StudentController::class)->group(function() {  
        Route::get('studentswithaccount','index');
      });

      Route::resource('fee_invoices',FeeInvoicesController::class);

     Route::resource('receipt',ReceiptStudentController::class);

     Route::get('receiptditalis/{id}',[ReceiptStudentController::class , 'receiptditalis' ])->name('receiptditalis');


});




// /////////////////////////////////////// logout student /////////////////////////////////////////////////////////////////
Route::post('logout/accountant', [AccountantController::class, 'destroy'])->middleware('auth:accountant')->name('accountant.logout');
//#############################################################################################
require __DIR__.'/auth.php';