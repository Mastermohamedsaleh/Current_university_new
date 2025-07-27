<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;




class StudentRequest extends FormRequest
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
                    'name'=>'required',
                    'email' => 'required|email|unique:admins',
                    'password'=>'required|string|min:6|max:10',
                    'ssn'=>'required',
                    'gender_id'=>'required',
                    'nationalitie_id'=>'required',
                    'academic_year'=>'required',
                    'college_id'=>'required',
                    'classroom_id'=>'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'ssn'=>'required',
                    'gender_id'=>'required',
                    'nationalitie_id'=>'required',
                    'academic_year'=>'required',
                    'college_id'=>'required',
                    'classroom_id'=>'required',
                    'email' => "unique:students,email,$this->id,id",
                    'email' => Rule::unique('students')->ignore($this->id),
                    'email' => Rule::unique('students')->ignore($this->route()->student->id),
                ];
            }
            default: break;
        }

    }

    public function messages()
    {
        return [
            'college_id.exists' => 'Enter College',
            'classroom_id.exists' => 'Enter Classroom',
            'classroom_id.required' => 'Enter Classroom',
            'college_id.required' => 'Enter College',
        ];
    }



}
