<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
            'name'=>'required',
            'course_id'=>'required|exists:courses,id',
            'start_time'  =>'required|date',
            'end_time'=> 'required|date|after_or_equal:start_time'
        ];
    }

    public function messages()
    {
        return [
            'course_id.exists' => 'Enter Course',
            'course_id.required' => 'Enter Course',
            'end_time.after_or_equal' => 'The end date must be greater than or equal to the start date ',

        ];
    }


}
