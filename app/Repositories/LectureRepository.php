<?php
namespace App\Repositories;

use App\Models\Lecture;
use Illuminate\Support\Collection;


use App\Interfaces\LectureRepositoryInterface;


class LectureRepository implements LectureRepositoryInterface
{

  
   public function create(array $data): Lecture
    {
        return Lecture::create($data);
    }

  public function update(Lecture $lecture, array $data): bool
    {
       return $lecture->update($data);
    }

    public function delete(Lecture $lecture): bool
    {
        return $lecture->delete();
    }    

}