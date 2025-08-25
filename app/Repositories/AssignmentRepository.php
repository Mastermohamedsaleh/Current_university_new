<?php

namespace App\Repositories;

use App\Models\Assignment;
use Illuminate\Support\Facades\File;

use App\Interfaces\AssignmentRepositoryInterface;

class AssignmentRepository implements AssignmentRepositoryInterface
{
    public function getAllByDoctor($doctorId)
    {
        return Assignment::where('doctor_id', $doctorId)->get();
    }

    public function getByIdForDoctor($id, $doctorId)
    {
        return Assignment::where('id', $id)->where('doctor_id', $doctorId)->first();
    }

    public function create(array $data)
    {
        return Assignment::create($data);
    }

    public function update($assignment, array $data)
    {
        return $assignment->update($data);
    }

    public function delete($assignment)
    {
        $path = public_path("Assignment_Doctor/{$assignment->file_name}");
        if (File::exists($path)) {
            File::delete($path);
        }
        return $assignment->delete();
    }
}
