<?php 

namespace App\Services;

use App\Interfaces\LectureRepositoryInterface;
use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class LectureService
{ 
     protected $lectureRepository;

    public function __construct(LectureRepositoryInterface $lectureRepository)
    {
        $this->lectureRepository = $lectureRepository;
    }

     public function createLecture(array $data) 
     {
          $course = Course::where('id' , $data['course_id'])
          ->where('doctor_id',auth()->user()->id)
          ->first();

        if (!$course) {
            throw new \Exception("Course not found or unauthorized");
        }


        // handle file upload
        if (isset($data['file_name'])) {
            $fileName = time().'.'.$data['file_name']->extension();
            $data['file_name']->move(public_path('Lecture_Doctor'), $fileName);
            $data['file_name'] = $fileName;
        }

        $data['doctor_id']    = Auth::id();
        $data['college_id']   = $course->college_id;
        $data['classroom_id'] = $course->classroom_id;
        $data['section_id']   = $course->section_id;

        return $this->lectureRepository->create($data);

     }





     public function update(int $id,array $data): bool
     { 
         $lecture = Lecture::findOrFail($id);
           $course  = Course::findOrFail($data['course_id']);
            // handle file update
        if (isset($data['file_name'])) {
            $oldFile = public_path('Lecture_Doctor/'.$lecture->file_name);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $fileName = time().'.'.$data['file_name']->extension();
            $data['file_name']->move(public_path('Lecture_Doctor'), $fileName);
            $data['file_name'] = $fileName;
        } else {
            $data['file_name'] = $lecture->file_name;
        }
                $data['doctor_id']    = Auth::id();
        $data['college_id']   = $course->college_id;
        $data['classroom_id'] = $course->classroom_id;
        $data['section_id']   = $course->section_id;

        $this->lectureRepository->update($data);

     }

      public function deleteLecture($id)
    {
        $lecture = Lecture::findOrFail($id);
        $filePath = public_path("Lecture_Doctor/{$lecture->file_name}");

        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        return $this->lectureRepository->delete($lecture);
    }





}