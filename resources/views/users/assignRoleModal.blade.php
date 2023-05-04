<div id="assignRole{{ $user->id }}" class="modal fade effect-flip-vertical" style="display: none;"
    value="{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content">
            <form action="{{ route('user-management.assign-role') }}" method="post">
                @csrf
                <div class="modal-body">
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title mb-2">{{ __('userManagement.Assign a role') }}</h4>
                    <p class="text-muted">{{ __('userManagement.Select a role to assign') }}</p>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="form-group">
                        <select name="name" id="name"
                            class="form-control select2 form-select select2-hidden-accessible @error('name') is-invalid @enderror"
                            data-placeholder="{{ __('userManagement.Select a role') }}">
                            <option value="">{{ __('userManagement.Select a role') }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}"
                                    {{ old('name') == $role->name || $user->roles->first() == $role->name ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>

                        @error('name')
                            <strong>
                                <span class="text-danger">{{ $message }}</span>
                            </strong>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block mt-5" type="submit">{{ __('Continue') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
