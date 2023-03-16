<div class="modal fade" id="assignProjectModal{{ $user->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-center">
            <form action="{{ route('users.assign-project', $user) }}" method="post">
                @csrf @method('put')
                <div class="modal-header">
                    <h3 class="modal-title">{{ __('Assign a project') }}</h3>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-4">{{ __('Select a project ') }}</h5>
                    <div class="form-group mb-3">
                        <label for="project_id" class="form-label">{{ __('project name') }}</label>
                        <select name="project_id" id="project_id"
                            class="form-control select2-show-search form-select select2-hidden-accessible @error('project_id') is-invalid @enderror"
                            data-placeholder="{{ __('Select a project') }}">
                            <option value="">{{ __('Select a project') }}</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ old('project_id') == $project->id || $user->project_id == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}</option>
                            @endforeach
                        </select>

                        @error('project_id')
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
