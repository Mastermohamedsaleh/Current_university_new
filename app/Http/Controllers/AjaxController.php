<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Student;

class AjaxController extends Controller
{
    

    public function GetCourse($id){
        $list_course = Course::where("classroom_id", $id)->pluck("name", "id");
        return $list_course;
    }

    public function report_student($id){
        $course = Course::where("id", $id)->first();
        $list_student =  Student::where('college_id',$course->college_id)->where('classroom_id',$course->classroom_id)->where('section_id',$course->section_id)->pluck("name", "id");
        return $list_student;


    }



}
