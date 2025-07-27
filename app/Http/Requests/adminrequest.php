<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class adminrequest extends FormRequest
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
                    'email' => 'required|email|unique:admins',
                    'password' => 'required|string|min:6|max:15',
                    'college_id'=>'required|exists:colleges,id',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'email' => "unique:admins,email,$this->id,id",
                                     
                    //below way will only work in Laravel ^5.5 
                    'email' => Rule::unique('admins')->ignore($this->id),
    
                   //Sometimes you dont have id in $this object
                   //then you can use route method to get object of model 
                   //and then get the id or slug whatever you want like below:
    
                  'email' => Rule::unique('admins')->ignore($this->route()->admin->id),
                ];
            }
            default: break;
        }







    }
    
    public function messages()
    {
        return [
            'college_id.exists' => 'Enter College',
            'college_id.required' => 'Enter College'
        ];
        }
}
