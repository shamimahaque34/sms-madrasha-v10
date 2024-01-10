<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuranChapterFormRequest extends FormRequest
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
            'arabic_name'       => 'required',
            'bangla_name'       => 'required',
            'english_name'      => 'required',
            'chapter_serial'    => 'required',
            'total_verse'       => 'required',
            'surah_origin'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'arabic_name.required'           => 'Arabic Name required',
            'bangla_name.required'           => 'Bangla Name required',
            'english_name.required'          => 'English Name required ',
            'chapter_serial.required'        => 'Chapter Serial required',
            'total_verse.required'           => 'Total Verse required',
            'surah_origin.required'          => 'Select a Origin required',
        ];
    }
}
