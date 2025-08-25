<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lecture;

class CourseController extends Controller
{
    // دكتور يشوف كورساتو
    public function courses()
    {
        $courses = Course::where('doctor_id', auth()->id())->get();
        return view('Doctor.My_Lecture.course', compact('courses'));
    }

    // دكتور يشوف محاضرات كورس معيّن
    public function lecturedoctor(Request $request, $course_id)
    {
        // نجيب الكورس ونتأكد إنه يخص الدكتور الحالي
        $course = Course::where('id', $course_id)
            ->where('doctor_id', auth()->id())
            ->first();

        if (! $course) {
            return redirect()->back()->withErrors(['error' => 'Course not found or not authorized']);
        }

        // البحث (لو فيه كلمة مفتاحية)
        $search = $request->input('search');
        $lecturesQuery = Lecture::where('course_id', $course_id)
            ->where('doctor_id', auth()->id());

        if ($search) {
            $lecturesQuery->where('title', 'like', "%{$search}%");
        }

        $lectures = $lecturesQuery->orderBy('id', 'DESC')->get();

        // لو فيه محاضرات أو لا
        if ($lectures->isEmpty()) {
            return redirect()->back()->withErrors(['error' => 'No lectures found']);
        }

        return view('Doctor.My_Lecture.index', compact('lectures', 'course_id'));
    }
}
