<div class="modal fade" id="leaveRequestDetail{{ $leaveRequest->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Leave Request Details') }}</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div>
                    <h4 class="mb-3 text-primary">{{ __('Employee Details') }}</h4>
                    <div class="row">
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Fullname: ') }}</dt>
                            <dd>{{ $leaveRequest->user->fullname() }}</dd>
                        </dl>
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Employee ID: ') }}</dt>
                            <dd>{{ $leaveRequest->user->id }}</dd>
                        </dl>
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Reports to: ') }}</dt>
                            <dd>{{ $leaveRequest->user->teams->first()->teamLeader->fullname() ?? 'N/A' }}</dd>
                        </dl>
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Project: ') }}</dt>
                            <dd>{{ $leaveRequest->user->project->name ?? 'N/A' }}</dd>
                        </dl>
                    </div>
                </div>

                <div>
                    <h4 class="mb-3 text-primary">{{ __('Leave Request Details') }}</h4>
                    <div class="row">
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Leave Type: ') }}</dt>
                            <dd>{{ $leaveRequest->leaveType->name_en }}</dd>
                        </dl>
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Requested Days ') }}</dt>
                            <dd>{{ $leaveRequest->number_of_days }}</dd>
                        </dl>
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Leave period ') }}</dt>
                            <dd>{{ date('d/m/Y', strtotime($leaveRequest->start_date)) . ' => ' . date('d/m/Y', strtotime($leaveRequest->end_date)) }}
                            </dd>
                        </dl>
                        <dl class="card-text col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <dt>{{ __('Creation Date: ') }}</dt>
                            <dd>{{ date('d/m/Y H:i:s', strtotime($leaveRequest->created_at)) }}</dd>
                        </dl>
                        <dl class="card-text col-12">
                            <dt>{{ __('Employee comment: ') }}</dt>
                            <dd>{{ $leaveRequest->leave_request_motive ?? __('No comment') }}</dd>
                        </dl>
                    </div>
                </div>

                <div class="mt-3">
                    <h4 class="mb-3 text-primary">{{ __('Leave Request Status') }}</h4>
                    @if ($leaveRequest->status == 'Canceled')
                        {{ __('Leave request canceled by the user: ') }}
                        <strong>{{ $leaveRequest->user->fullname() }}</strong>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Validator profile') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Treated by') }}</th>
                                    <th>{{ __('Treated at') }}</th>
                                    <th>{{ __('SLA') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaveRequest->workflowStageApprovals as $workflowStageApproval)
                                    <tr>
                                        <td>{{ $workflowStageApproval->workflowStage->approvedBy->name_en }}</td>
                                        <td>{{ $workflowStageApproval->status }}</td>
                                        <td>{{ $workflowStageApproval->user ? $workflowStageApproval->user->fullname() : '' }}
                                        </td>
                                        <td>{{ $workflowStageApproval->treated_at ? date('d/m/Y H:i:s', strtotime($workflowStageApproval->updated_at)) : '' }}
                                        </td>
                                        <td>{{ $workflowStageApproval->treated_at ? $workflowStageApproval->created_at->diff($workflowStageApproval->updated_at)->format('%H:%I:%S') : '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
