<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'date_of_birth' => 'date|nullable',
            'phone' => 'min:10|max:10|nullable',
            'email' => 'required|email|string|unique:users,email,',
            'integration_date' => 'required|date',
            'sourcing_type_id' => 'nullable',
            'recrutment_platforme_id' => 'nullable',
            'language_id' => 'required',
            'language_level_id' => 'nullabe',
            'identity_document_id' => 'required',
            'identity_document_number' => 'required|max:15',
            'social_security_number' => 'nullable|max:15',
            'address' => 'nullable|max:200|string',
            'marital_status_id' => 'nullable',
            'number_of_kids' => 'nullable',
            'image' => 'file|mimes:png,jpg,jpeg,svg',
        ];
    }
}
