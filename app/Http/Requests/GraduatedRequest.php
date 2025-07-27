<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GraduatedRequest extends FormRequest
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
            'section_id'=>'exists:students',
        ];
    }

    public function messages()
    {
        return [
            'college_id.required' => 'The College is required.',
            'college_id.exists' => 'The College is required.'
        ];
        }

}
