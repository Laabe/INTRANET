<div class="modal fade" id="assignManagerModal{{ $project->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <form action="{{ route('projects.assign-manager', $project) }}" method="post">
                @csrf @method('put')
                <div class="modal-header">
                    <h3 class="modal-title">{{ __('Assign a Manager') }}</h3>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-4">{{ __('Select a manager for the project ') . $project->name }}</h5>
                    <div class="form-group mb-3">
                        <label for="manager_id" class="form-label">{{ __('Project Manager') }}</label>
                        <select name="manager_id" id="manager_id"
                            class="form-control select2-show-search form-select select2-hidden-accessible @error('manager_id') is-invalid @enderror"
                            data-placeholder="Select a manager">
                            <option value="">{{ __('Select a manager') }}</option>
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}"
                                    {{ old('manager_id') == $manager->id || $project->manager_id == $manager->id ? 'selected' : '' }}>
                                    {{ $manager->fullname() }}</option>
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
                    <button class="btn btn-primary">{{ __('Save') }}</button>
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
