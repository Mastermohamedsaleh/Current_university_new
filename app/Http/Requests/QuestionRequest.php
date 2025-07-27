<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'typequestion' => 'required|in:trueorfale,choose',
            'quizz_id'=>'required', 
            'answers'=>'required',
            'right_answer'=>'required',
            'score'=>'required|in:1,2.5,3,5,10,15,20',
            'title'=>'required'
        ];
    }



    
    public function messages()
    {
        return [
            'quizz_id.required' => 'Some Thing Wrong',
        ];
    }


}

// numeric