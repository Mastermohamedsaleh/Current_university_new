<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


use Illuminate\Validation\Rule;



class DoctorRequest extends FormRequest
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
                    'email' => 'required|email|unique:doctors',
                     'password'=>'required|string|min:6|max:10',
                     'ssn'=>'required',
                     'address'=>'required',
                     'gender_id'=>'required',
                     'nationalitie_id'=>'required',
                     'Joining_Date'=>'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'ssn'=>'required',
                    'address'=>'required',
                    'gender_id'=>'required',
                    'nationalitie_id'=>'required',
                    'Joining_Date'=>'required',
                    'email' => "unique:doctors,email,$this->id,id",
                    'email' => Rule::unique('doctors')->ignore($this->id),
                    'email' => Rule::unique('doctors')->ignore($this->route()->doctor->id),
                ];
            }
            default: break;
        }


    }
}
