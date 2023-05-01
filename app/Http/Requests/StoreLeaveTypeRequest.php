<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeaveTypeRequest extends FormRequest
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
        $locales = config('app.available_locale');

        $rules = [
            'name_en' => 'required|string|max:30|unique:leave_types,name_en',
            'deductable' => 'required|boolean',
        ];

        foreach ($locales as $locale) {
            $rules['name_' . $locale] = 'required|string|max:30|unique:leave_types,name_en';
        }

        return $rules;
    }
}
