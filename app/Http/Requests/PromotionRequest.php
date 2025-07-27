<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'college_id'=>'required|exists:students',
            'classroom_id'=>'required|exists:students',
            'section_id'=>'exists:students',
            'college_id_new'=>'required',
            'classroom_id_new'=>'required',
            
        ];
    }


    public function messages()
    {
        return [
            'college_id.required' => 'The College is required.',
            'college_id.exists' => 'The College is required.',
            'classroom_id.required' => 'classroom is required .',
            'classroom_id.exists' => 'classroom is required .',
            'section_id.exists:students' => 'section is required .',
            'college_id_new.required'=>'new college is required ',
            'classroom_id_new.required'=>'new classroom is required ',
        ];
    }


}
