<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name' => 'required|min:3|max:30|string',
            'last_name' => 'required|min:3|max:30|string',
            'gender_id' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'phone' => 'min:10|max:10',
            'email' => 'required|email|string|unique:users,email,' . $this->user->id,
            'integration_date' => 'required|date',
            'sourcing_type_id' => 'numeric',
            'recrutment_platforme_id' => 'numeric',
            'language_id' => 'required|numeric',
            'language_level_id' => 'numeric',
            'identity_document_id' => 'required|numeric',
            'identity_document_number' => 'required|max:15',
            'social_security_number' => 'nullable|max:15',
            'address' => 'required|max:50|string',
            'marital_status_id' => 'nullable|numeric',
            'number_of_kids' => 'nullable|numeric',
            'image' => 'file|mimes:png,jpg,jpeg,svg',
        ];
    }
}
