<?php

namespace App\Interfaces;

use App\Models\Quizze;
use Illuminate\Support\Collection;

interface QuizzeRepositoryInterface
{ 

    public function allQuizeByDoctor(int $doctorId): Collection;

      public function findByIdAndDoctor(int $id, int $doctorId): ?Quizze;

    public function create(array $data): Quizze;

    public function update(Quizze $quizze, array $data): bool;

     public function delete(int $id): bool;



}