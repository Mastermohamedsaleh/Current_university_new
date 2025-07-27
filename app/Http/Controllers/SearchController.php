<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReceiptStudent;
use App\Models\Student;


class SearchController extends Controller
{
    public function SearchReceipt(Request $request){

    }



    public function graduated(Request $request){
        
        $search = $request->input('search');
          
        if ($search) { 
            $students = Student::where('college_id',auth()->user()->college_id)->where('name', 'like', "%$search%")->orwhere('email', 'like', "%$search%")->onlyTrashed()->paginate(PAGENATOR_COUNT);
        }else{
            $students = Student::where('college_id',auth()->user()->college_id)->onlyTrashed()->paginate(PAGENATOR_COUNT);
        }

        return view('Admin.graduated.index',compact('students'));

         
    }


     
}
