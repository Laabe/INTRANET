<div class="modal fade" id="assignManagerModal{{ $department->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <form action="{{ route('departments.assign-manager', $department) }}" method="post">
                @csrf @method('put')
                <div class="modal-header">
                    <h3 class="modal-title">{{ __('department.Assign a Manager') }}</h3>
                    <button aria-label="Close" class="btn-close" type="button" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-4">{{ __('department.Select a manager for the ') . $department->{'name_' . app()->getLocale()} }}</h5>
                    <div class="form-group mb-3">
                        <label for="manager_id" class="form-label">{{ __('department.Department Manager') }}</label>
                        <select name="manager_id" id="manager_id"
                            class="form-control select2-show-search form-select select2-hidden-accessible @error('manager_id') is-invalid @enderror"
                            data-placeholder="{{ __('department.Select a manager') }}">
                            <option value="">{{ __('department.Select a manager') }}</option>
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}"
                                    {{ old('manager_id') == $manager->id || $department->manager_id == $manager->id ? 'selected' : '' }}>
                                    {{ $manager->name }}</option>
                            @endforeach
                        </select>

                        @error('manager_id')
                            <strong>
                                <span class="text-danger">{{ $message }}</span>
                            </strong>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">{{ __('department.Save') }}</button>
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">{{ __('department.Cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
