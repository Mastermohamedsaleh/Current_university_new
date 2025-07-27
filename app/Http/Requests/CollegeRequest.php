<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;




class CollegeRequest extends FormRequest
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
                    'name' => 'required|unique:colleges',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => "required|unique:colleges,name,$this->id,id",
                    'name' => Rule::unique('colleges')->ignore($this->id),
                    'name' => Rule::unique('colleges')->ignore($this->route()->college->id),
                ];
            }
            default: break;
        }
    }
}
