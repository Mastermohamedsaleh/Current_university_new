<?php

namespace App\Repositories;

use App\Models\Student;



use App\Interfaces\StudentRepositoryInterface;
 
class StudentRepository implements StudentRepositoryInterface
{ 


     public function update(array $ids, array $data)
    {
        return Student::whereIn('id', $ids)->update($data);
    }

    public function getStudents(array $filters)
    {

          $query = Student::where('college_id', $filters['college_id'])
                        ->where('classroom_id', $filters['classroom_id']);
                        // ->where('academic_year', $filters['academic_year']);

       if(!empty($filters['section_id'])){
            $query->where('section_id', $filters['section_id']);
        }
        // return $query->get();

 return $query->get();
      

    }


}