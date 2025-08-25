<?php
namespace App\Interfaces;

use App\Models\Question;

interface QuestionRepositoryInterface
{ 

    public function create(array $data): Question;

    public function update(Question $question, array $data): bool;

    public function delete(int $id): bool;

}