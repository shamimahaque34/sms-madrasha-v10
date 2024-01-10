<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuranTranslationProviderFormRequest extends FormRequest
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
            'brand_name'                     => 'required',
            'translated_by'                  => 'required',
            'language'                       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required'                 => 'Brand Name Required',
            'translated_by.required'              => 'Translated By Required',
            'language.required'                   => 'Select a Language',
            'status.numeric'                      => 'select a Status ',
        ];
    }
}
