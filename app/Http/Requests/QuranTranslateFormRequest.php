<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuranTranslateFormRequest extends FormRequest
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
            'quran_chapter_id'                     => 'required',
            'quran_verse_id'                       => 'required',
            'quran_translation_provider_id'        => 'required',
            'translated_verse'                     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'quran_chapter_id.required'                 => 'Select a Quran Chapter',
            'quran_verse_id.required'                   => 'Select a Quran Verse',
            'quran_translation_provider_id.required'    => 'Select a Quran Translation Provider',
            'translated_verse.required'                 => 'Translated Verse required',
        ];
    }
}
