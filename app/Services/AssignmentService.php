<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Student;
use App\Repositories\AssignmentRepository;
use Illuminate\Support\Facades\File;
use App\Notifications\NewAssignmentAdded;

use App\Events\AssignmentCreated;

class AssignmentService
{
    protected $assignmentRepo;

    public function __construct(AssignmentRepository $assignmentRepo)
    {
        $this->assignmentRepo = $assignmentRepo;
    }

    public function getAllAssignmentsForDoctor($doctorId)
    {
        return $this->assignmentRepo->getAllByDoctor($doctorId);
    }

    public function createAssignment(array $data)
    {
        $course = Course::findOrFail($data['course_id']);
        // $fileName = time() . '.' . $data['file_name']->extension();
        // $data['file_name']->move(public_path('Assignment_Doctor'), $fileName);



   if (isset($data['file_name'])) {
        $file = $data['file_name']; // ده object UploadedFile من Controller
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('Assignment_Doctor'), $fileName);
        $data['file_name'] = $fileName;
    }

        $assignment =$this->assignmentRepo->create(
                [
            'name'=> $data['name'],
            'course_id'    => $course->id,
            'college_id'   => $course->college_id,
            'classroom_id' => $course->classroom_id,
            'section_id'   => $course->section_id,
            'start_time'   => $data['start_time'],
            'end_time'     => $data['end_time'],
            'file_name'    => $fileName,
            'degree'       => $data['degree'],
            'doctor_id'    => auth()->id(),
                ]
             );    
// 1️⃣ تبعث Notification لكل طالب
$students = Student::where('college_id', $assignment->college_id)
    ->where('classroom_id', $assignment->classroom_id)
    ->get();


        return $assignment;
        
    }

    public function updateAssignment($request, $id)
    {
        $assignment = $this->assignmentRepo->getByIdForDoctor($id, auth()->id());
        if (!$assignment) throw new \Exception('Assignment not found.');

        $course = Course::findOrFail($request->course_id);

        if ($request->hasFile('file_name')) {
            $oldPath = public_path('Assignment_Doctor/' . $assignment->file_name);
            if (File::exists($oldPath)) File::delete($oldPath);

            $fileName = time() . '.' . $request->file('file_name')->extension();
            $request->file('file_name')->move(public_path('Assignment_Doctor'), $fileName);
        } else {
            $fileName = $assignment->file_name;
        }

        $data = [
            'name'         => $request->name,
            'file_name'    => $fileName,
            'doctor_id'    => auth()->id(),
            'course_id'    => $request->course_id,
            'college_id'   => $course->college_id,
            'classroom_id' => $course->classroom_id,
            'section_id'   => $course->section_id,
            'degree'       => $request->degree,
        ];

        return $this->assignmentRepo->update($assignment, $data);
    }

    public function deleteAssignment($id)
    {
        $assignment = $this->assignmentRepo->getByIdForDoctor($id, auth()->id());
        if (!$assignment) throw new \Exception('Assignment not found.');

        return $this->assignmentRepo->delete($assignment);
    }

    public function getAssignmentFile($id)
    {
        return $this->assignmentRepo->getByIdForDoctor($id, auth()->id());
    }

    public function getAssignmentForEdit($id)
    {
        return $this->assignmentRepo->getByIdForDoctor($id, auth()->id());
    }
}
