<?php

namespace App\Services;

use App\Models\Course;
use App\Repositories\AssignmentRepository;
use Illuminate\Support\Facades\File;

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

    public function createAssignment($request)
    {
        $course = Course::findOrFail($request->course_id);
        $fileName = time() . '.' . $request->file('file_name')->extension();
        $request->file('file_name')->move(public_path('Assignment_Doctor'), $fileName);

        $data = [
            'name'         => $request->name,
            'course_id'    => $course->id,
            'college_id'   => $course->college_id,
            'classroom_id' => $course->classroom_id,
            'section_id'   => $course->section_id,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'file_name'    => $fileName,
            'degree'       => $request->degree,
            'doctor_id'    => auth()->id(),
        ];

        return $this->assignmentRepo->create($data);
        
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
