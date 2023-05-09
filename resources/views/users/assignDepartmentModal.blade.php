<div class="modal fade" id="assignDepartmentModal{{ $user->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-center">
            <form action="{{ route('users.assign-department', $user) }}" method="post">
                @csrf @method('put')
                <div class="modal-header">
                    <h3 class="modal-title">{{ __('employeeManagement.Assign a Department') }}</h3>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-4">{{ __('employeeManagement.Select a department') }}</h5>
                    <div class="form-group mb-3">
                        <label for="department_id" class="form-label">{{ __('employeeManagement.Department name') }}</label>
                        <select name="department_id" id="department_id"
                            class="form-control select2-show-search form-select select2-hidden-accessible @error('department_id') is-invalid @enderror"
                            data-placeholder="{{ __('employeeManagement.Select a department') }}">
                            <option value="">{{ __('employeeManagement.Select a department') }}</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id || $user->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name_en }}</option>
                            @endforeach
                        </select>

                        @error('department_id')
                            <strong>
                                <span class="text-danger">{{ $message }}</span>
                            </strong>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">{{ __('employeeManagement.Save') }}</button>
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">{{ __('employeeManagement.Cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
