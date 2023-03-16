<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        return [
            'name_fr' => 'required|string|max:30|unique:profiles,name_fr,' . $this->profile->id,
            'name_en' => 'required|string|max:30|unique:profiles,name_en,' . $this->profile->id,
            'name_de' => 'required|string|max:30|unique:profiles,name_de,' . $this->profile->id,
        ];
    }
}
