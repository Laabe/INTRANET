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
        return [
            'name_fr' => 'required|string|max:30|unique:leave_types,name_fr',
            'name_en' => 'required|string|max:30|unique:leave_types,name_en',
            'name_de' => 'required|string|max:30|unique:leave_types,name_de',
            'deductable' => 'required|boolean',
        ];
    }
}
