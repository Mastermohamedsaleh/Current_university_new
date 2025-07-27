<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyScheduleRequest extends FormRequest
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
            'college_id'=>'required|exists:colleges,id',
            'classroom_id'=>'required|exists:classrooms,id',
            'course_id'=>'required|exists:courses,id',
            'course_day'=>'required',
            'start_time.*' => 'required',
            'end_time.*' => 'required',
            'doctor_id'=>'required|exists:doctors,id',
        ];
    }


    public function messages()
    {
        return [
            'college_id.exists' => 'Enter College',
            'college_id.required' => 'Enter College is required',
            'classroom_id.exists' => 'Enter Classroom',
            'classroom_id.required' => 'Enter Classroom is required',
            'course_id.exists' => 'Enter Course',
            'course_id.required' => 'Enter Course is required',
            'doctor_id.exists' => 'Enter  Doctor',
            'doctor_id.required' => 'Enter  Doctor',
        ];
    }
}
