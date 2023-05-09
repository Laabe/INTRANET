<div class="modal fade" id="assignProfileModal{{ $user->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-center">
            <form action="{{ route('users.assign-profile', $user) }}" method="post">
                @csrf @method('put')
                <div class="modal-header">
                    <h3 class="modal-title">{{ __('employeeManagement.Assign a profile') }}</h3>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-4">{{ __('employeeManagement.Select a profile') }}</h5>
                    <div class="form-group mb-3">
                        <label for="profile_id" class="form-label">{{ __('employeeManagement.profile name') }}</label>
                        <select name="profile_id" id="profile_id"
                            class="form-control select2-show-search form-select select2-hidden-accessible @error('profile_id') is-invalid @enderror"
                            data-placeholder="{{ __('employeeManagement.Select a profile') }}">
                            <option value="">{{ __('employeeManagement.Select a profile') }}</option>
                            @foreach ($profiles as $profile)
                                <option value="{{ $profile->id }}"
                                    {{ old('profile_id') == $profile->id || $user->profile_id == $profile->id ? 'selected' : '' }}>
                                    {{ $profile->name_en }}</option>
                            @endforeach
                        </select>

                        @error('profile_id')
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
