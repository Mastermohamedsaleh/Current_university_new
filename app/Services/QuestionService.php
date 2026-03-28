<?php

namespace App\Services;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Quizze;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuestionService
{
    protected $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }


    public function create(array $data): Question
    {
        $quiz = Quizze::where('id', $data['quizz_id'])
            ->where('doctor_id', auth()->id())
            ->firstOrFail();

        $answersArray = $this->validateAndExplode($data);

        return DB::transaction(function () use ($data, $answersArray, $quiz) {
            
            $question = $this->questionRepository->create([
                'title'        => $data['title'],
                'answers'      => implode('-', $answersArray),
                'right_answer' => $data['right_answer'],
                'score'        => $data['score'],
                'quizze_id'    => $data['quizz_id'],
            ]);

            if ($quiz->type_quiz == 0) {
                $this->saveOptions($question->id, $answersArray, $data['score']);
            }

            return $question;
        });
    }

    protected function validateAndExplode($data)
    {
        $answers = explode('-', trim($data['answers']));
        $count = count($answers);

        if ($data['typequestion'] == 'trueorfale' && $count != 2) {
            $this->abortWithError('يجب إدخال إجابتين فقط ويفصل بينهما -');
        }

        if ($data['typequestion'] == 'choose' && $count != 3) {
            $this->abortWithError('يجب إدخال 3 إجابات ويفصل بينهما -');
        }

        return $answers;
    }

    protected function saveOptions($questionId, $answers, $score)
    {
        foreach ($answers as $answerText) {
            DB::table('options')->insert([
                'question_id' => $questionId,
                'option_text' => $answerText,
                'points'      => $score,
            ]);
        }
    }

    protected function abortWithError($message)
    {
        Session::flash('error', $message);
        abort(redirect()->back());
    }
}