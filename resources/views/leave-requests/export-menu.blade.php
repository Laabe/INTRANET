<div class="modal fade" id="export" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('leave-requests.export') }}" method="post">

                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('leaveRequest.Leave Request Details') }}</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info" role="alert">
                        <span class="alert-inner--icon me-2"><i class="fe fe-info"></i></span>
                        <span class="alert-inner--text">
                            <strong>{{ __('leaveRequest.Warning!') }}</strong>
                            {{ __('leaveRequest.Please select the dates for better results') }}
                        </span>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-lg-6 col-xl-6 col-md-12 col-sm-12">
                            <label for="from_date" class="form-label">{{ __('leaveRequest.From Date') }}(<span
                                    class="text-danger">*</span>)</label>
                            <input type="date" name="from_date" id="from_date" class="form-control">
                        </div>
                        <div class="mb-3 col-lg-6 col-xl-6 col-md-12 col-sm-12">
                            <label for="to_date" class="form-label">{{ __('leaveRequest.To Date') }}(<span
                                    class="text-danger">*</span>)</label>
                            <input type="date" name="to_date" id="to_date" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-lg-6 col-xl-6 col-md-12 col-sm-12">
                            <label for="leave_type" class="form-label">{{ __('leaveRequest.Leave Type') }}</label>
                            <select name="leave_type" id="leave_type" class="form-control">
                                <option value="" disabled selected hidden>{{ __('leaveRequest.Select a leave type') }}</option>
                                @foreach ($leaveTypes as $leaveType)
                                    <option value="{{ $leaveType->id }}">{{ $leaveType->{'name_' . app()->getLocale()} }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6 col-xl-6 col-md-12 col-sm-12">
                            <label for="user" class="form-label">{{ __('leaveRequest.Employee') }}</label>
                            <select name="user" id="user" class="form-control">
                                <option value="" disabled selected hidden>{{ __('leaveRequest.Select an employee') }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->fullname() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">{{ __('Export') }}</button>
                    <button class="btn btn-light" data-bs-dismiss="modal" type="button">{{ __('leaveRequest.Close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
