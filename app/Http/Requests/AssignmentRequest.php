<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
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
                    'course_id'=>'required|exists:courses,id',
                    'start_time'=>'required',
                    'end_time'=>'required',
                    'degree'=>'required|in:1,2.5,3,5,10,15,20,25,30',
                    'file_name' => 'required|mimes:pdf|max:10000',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'=>'required',
                    'course_id'=>'required|exists:courses,id',
                    'start_time'=>'required',
                    'end_time'=>'required',
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
