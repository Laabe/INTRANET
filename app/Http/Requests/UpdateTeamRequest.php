<?php

namespace App\Http\Requests;

use App\Models\Department;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
        $productionDepartmentId = Department::where('name_en', 'like', '%Production%')->get()->pluck('id');

        return [
            'name' => 'required|max:30|string|unique:teams,name,' . $this->team->id,
            'department_id' => 'required|numeric',
            'project_id' => 'required_if:department_id,' . $productionDepartmentId,
            'team_leader_id' => 'required|numeric'
        ];
    }
}
