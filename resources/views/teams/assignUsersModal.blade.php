<div id="assignUsers{{ $team->id }}" class="modal fade effect-flip-vertical" style="display: none;"
    value="{{ $team->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('teams.assign-users', $team) }}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Associate users to ') }} {{ $team->name }}</h4>
                    <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                            aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="users_id[]" class="form-label">{{ __('Select employees') }}</label>
                        <select name="users_id[]"
                            class="form-control select2 form-select select2-hidden-accessible @error('users_id[]') is-invalid @enderror"
                            data-placeholder="{{ __('Select users') }}" name="users_id[]" id="users_id[]" multiple>
                            <option value="">{{ __('Select users') }}</option>
                            @foreach ($users as $user)
                                @if ($user->id == $team->team_leader_id || in_array($user->id, $team->users->pluck('id')->toArray()))
                                    @continue
                                @endif
                                <option value="{{ $user->id }}">
                                    {{ $user->fullname() }}</option>
                            @endforeach
                        </select>

                        @error('users_id[]')
                            <strong>
                                <span class="text-danger">{{ $message }}</span>
                            </strong>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary btn-block" type="submit">{{ __('Associate employees') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
