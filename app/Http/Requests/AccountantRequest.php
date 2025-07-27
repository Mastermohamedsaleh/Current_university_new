<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class AccountantRequest extends FormRequest
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
                    'name' => 'required',
                    'email' => 'required|email|unique:accountants',
                    'password' => 'required|string|min:6|max:15',
                    'college_id'=>'required|exists:colleges,id',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'email' => "unique:accountants,email,$this->id,id",
                    'college_id'=>'required|exists:colleges,id',                
   
                    'email' => Rule::unique('accountants')->ignore($this->id),
    
    
                  'email' => Rule::unique('accountants')->ignore($this->route()->accountant->id),
                ];
            }
            default: break;
        }
    }
}
