<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateFormRequest extends FormRequest
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
            'parent_id' => 'required',
            'section_id'    => 'required',
            'student_group_id'  => 'required',
            'academic_class_id' => 'required',
            'username'  => 'required',
            'email' => 'required',
            'phone' => 'required',
            'religion'  => 'required',
            'division'  => 'required',
            'district'  => 'required',
            'country'   => 'required',
        ];
    }
}
