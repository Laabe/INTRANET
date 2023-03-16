<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeaveRequestRequest extends FormRequest
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
            'user_id' => 'required|numeric',
            'leave_type_id' => 'required|numeric',
            'number_of_days' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'comment' => 'nullable|string|max:50'
        ];
    }
}
