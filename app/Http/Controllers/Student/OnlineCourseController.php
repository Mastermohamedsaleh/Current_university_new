<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlineCourse;

use Illuminate\Support\Facades\Auth;


class OnlineCourseController extends Controller
{
    public function index()
    {
        $onlinecourse = OnlineCourse::where('college_id',  Auth::guard('student')->user()->college_id)
        ->where('classroom_id',    Auth::guard('student')->user()->classroom_id)
        ->where('section_id', Auth::guard('student')->user()->section_id)
        ->orderBy('id', 'DESC')
        ->get();
     return view('Student.onlinecourse.index', compact('onlinecourse'));
   
    }   
}
