<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name_en' => 'required|string|max:20|unique:languages,name_en',
        ];

        foreach (config('app.available_locale') as $locale) {
            $rules['name_' . $locale] = 'required|string|max:20|unique:languages,name_' . $locale . ',' . $this->language->id;
        }

        return $rules;
    }
}
