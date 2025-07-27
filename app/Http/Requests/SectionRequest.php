<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


use Illuminate\Validation\Rule;



class SectionRequest extends FormRequest
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
                    'name' => 'required|unique:sections',
                    'college_id'=>'required|exists:colleges,id|numeric',
                    'classroom_id'=>'required|exists:classrooms,id|numeric',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => "required|unique:sections,name,$this->id,id",
                    'name' => Rule::unique('sections')->ignore($this->id),
                    'name' => Rule::unique('sections')->ignore($this->route()->section->id),
                    'college_id'=>'required|exists:colleges,id|numeric',
                    'classroom_id'=>'required|exists:classrooms,id|numeric',
                ];
            }
            default: break;
        }
    }

    public function messages()
    {
        return [
            'college_id.required' => 'The College is required.',
            'classroom_id.required' => 'classroom is required .',
            'classroom_id.exists' => 'The Classroom is required .',
            'college_id.exists' => 'The College is required.',
            'college_id.numeric' => 'The College is required.',
            'classroom_id.numeric' => 'The Classroom is required.',
        ];
    }



}
