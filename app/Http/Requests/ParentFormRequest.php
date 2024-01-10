<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentFormRequest extends FormRequest
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
            'username'  => 'required',
            'name_english'  => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'gender'    => 'required',
            'religion'  => 'required',
            'address'   => 'required',
        ];
    }
}
