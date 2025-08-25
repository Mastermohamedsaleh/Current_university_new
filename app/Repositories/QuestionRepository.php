<?php

namespace App\Repositories;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{

    public function create(array $data): Question
    {
        return Question::create($data);
    }

    public function update(Question $question, array $data): bool
    {
        return $question->update($data);
    }

    public function delete(int $id): bool
    {
        return Question::destroy($id) > 0;
    }
}