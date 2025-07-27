<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'unvirsty_name' => 'required|max:60', 
            'phone' => 'required|min:13|numeric', 
            'address' => 'required|max:60', 
            'email' => 'required|email', 
            'link_facebook' => 'required|url|max:2000', 
            'link_linked_in' => 'required|url|max:2000', 
            'link_youtube' => 'required|url|max:2000', 
        ];
    }
}
