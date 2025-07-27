<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
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






        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'file_name' => 'required|mimes:pdf|max:2048',
                    'title'=>'required',
                    'course_id'=>'required|exists:courses,id',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title'=>'required',
                    'course_id'=>'required|exists:courses,id',
                ];
            }
            default: break;
        }


    }

    
    public function messages()
    {
        return [
            'course_id.exists' => 'Enter Course',
            'course_id.required' => 'Enter Course',
        ];
    }



}
