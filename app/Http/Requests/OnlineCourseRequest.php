<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlineCourseRequest extends FormRequest
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
            'course_id'=>'required',
            'topic'=>'required',
            // 'datetime-local'=>'required',
            'duration'=>'required',
            'meeting_id'=>'required',
            'password'=>'required',
            'start_url'=>'required',
            'join_url'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'course_id.required' => 'The Course is required.',

        ];
    }



}
