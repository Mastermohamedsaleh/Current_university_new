<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fee;
use App\Models\StudentAccount;

class FeeController extends Controller
{
 
    public function index(){

     $fees =  Fee::where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id',    Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)
        ->get();
      
        return view('Student.Fee.index',compact('fees'));
          
    }

    public function Details()
    {
        $data = date("Y");
        $studentAccounts = StudentAccount::where('student_id',Auth::guard('student')->user()->id)->where('academic_year',$data)->get();
        $studenDebit =   StudentAccount::where('student_id',Auth::guard('student')->user()->id)->where('academic_year',$data)->sum('Debit');
        $studentCredit = StudentAccount::where('student_id',Auth::guard('student')->user()->id)->where('academic_year',$data)->sum('credit');   
        $total = $studenDebit - $studentCredit;

        return view('Student.Fee.details',compact('studentAccounts','total'));

    }
 
      
     
}
