<?php

namespace App\Interfaces;

use App\Models\Student;

interface StudentRepositoryInterface
{ 
     public function update(array $ids, array $data);
     public function getStudents(array $filters);
}