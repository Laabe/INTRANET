<div id="deleteUser{{ $user->id }}" class="modal fade effect-flip-vertical" style="display: none;"
    value="{{ $user->id }}" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content">
            <form action="{{ route('users.destroy', $user) }}" method="post" class="form-horizontal">
                @csrf @method('delete')
                <div class="modal-body">
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title mb-2">{{ __('employeeManagement.Delete Employee') }}</h4>
                        <p class="text-muted">{{ __('employeeManagement.Select a reason for termination') }}</p>
                    </div>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <div class="row mb-3">
                        <label class="form-label col-lg-3 col-xl-3 col-md-12 col-sm-12">{{ __('employeeManagement.Employee') }}</label>
                        <div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
                            <input type="text"class="form-control" value="{{ $user->fullname() }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            class="form-label col-lg-3 col-xl-3 col-md-12 col-sm-12">{{ __('employeeManagement.Termination Reason') }}</label>
                        <div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
                            <select name="termination_reason" id="termination_reason"
                                class="form-control select2 form-select select2-hidden-accessible @error('termination_reason') is-invalid @enderror"
                                data-placeholder="{{ __('employeeManagement.Select a termination reason') }}"
                                style="width: 100% !important">
                                <option value="">{{ __('employeeManagement.Select a termination reason') }}</option>
                                @foreach ($terminationReasons as $reason)
                                    <option value="{{ $reason }}"
                                        {{ old('termination_reason') == $reason ? 'selected' : '' }}>
                                        {{ $reason }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label col-lg-3 col-xl-3 col-md-12 col-sm-12">{{ __('employeeManagement.Comment') }}</label>
                        <div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
                            <textarea name="termination_comment" id="termination_comment" cols="30" rows="2" class="form-control"
                                placeholder="{{ __('employeeManagement.Write here...') }}"></textarea>
                        </div>
                    </div>

                    <button class="btn btn-danger btn-block mt-5" type="submit">{{ __('employeeManagement.Continue') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
