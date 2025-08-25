<?php 

namespace App\Interfaces;
use Illuminate\Support\Collection;
use App\Models\Lecture;



interface LectureRepositoryInterface
{
    public function create(array $data): Lecture;
    public function update(Lecture $lecture, array $data): bool;
    public function delete(Lecture $lecture): bool;
}