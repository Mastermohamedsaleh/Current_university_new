<?php

namespace App\Repositories;

use App\Interfaces\QuizzeRepositoryInterface;
use App\Models\Quizze;
use Illuminate\Support\Collection;

class QuizzeRepository implements QuizzeRepositoryInterface
{

    public function allQuizeByDoctor(int $doctorId): Collection
    {
        return Quizze::where('doctor_id', $doctorId)->get();
    }

      public function findByIdAndDoctor(int $id, int $doctorId): ?Quizze 
      {
         return Quizze::where('id', $id)->where('doctor_id', $doctorId)->first();
      }

     public function create(array $data): Quizze
    {
        return Quizze::create($data);
    }

     public function update(Quizze $quizze, array $data): bool
    {
        return $quizze->update($data);
    }

    
    public function delete(int $id): bool
    {
        return Quizze::destroy($id) > 0;
    }

}