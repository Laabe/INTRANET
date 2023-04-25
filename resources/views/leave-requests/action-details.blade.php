<div class="modal fade" id="actionDetail{{ $record->leaveRequest->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Leave Request Details') }}</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div>
                    <h4 class="mb-3 text-primary">{{ __('Leave Request Details') }}</h4>
                    <div class="row">
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Leave Type: ') }}</dt>
                            <dd>{{ $record->leaveRequest->leaveType->name_en }}</dd>
                        </dl>
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Requested Days ') }}</dt>
                            <dd>{{ $record->leaveRequest->number_of_days }}</dd>
                        </dl>
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Leave period ') }}</dt>
                            <dd>{{ date('d/m/Y', strtotime($record->leaveRequest->start_date)) . ' => ' . date('d/m/Y', strtotime($record->leaveRequest->end_date)) }}
                            </dd>
                        </dl>
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Creation Date: ') }}</dt>
                            <dd>{{ date('d/m/Y H:i:s', strtotime($record->leaveRequest->created_at)) }}</dd>
                        </dl>
                        <dl class="card-text col-12">
                            <dt>{{ __('Employee comment: ') }}</dt>
                            <dd>{{ $record->leaveRequest->leave_request_motive ?? __('No comment') }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
