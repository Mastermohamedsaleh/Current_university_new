<?php

namespace App\Interfaces;

interface AssignmentRepositoryInterface
{
    public function getAllByDoctor($doctorId);
    public function getByIdForDoctor($id, $doctorId);
    public function create(array $data);
    public function update($assignment, array $data);
    public function delete($assignment);
}
