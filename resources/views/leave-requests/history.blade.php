@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('leave-requests.index') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">{{ __('leaveRequest.History of leave requests') }}</h3>
                    <a class="btn btn-primary" data-bs-target="#export" data-bs-toggle="modal" href="javascript:void(0)">{{ __('Export') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100 dataTable no-footer dtr-inline" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('leaveRequest.ID') }}</th>
                                    <th>{{ __('leaveRequest.EMPLOYEE') }}</th>
                                    <th>{{ __('leaveRequest.LEAVE TYPE') }}</th>
                                    <th>{{ __('leaveRequest.REQUESTED DAYS') }}</th>
                                    <th>{{ __('leaveRequest.START DATE') }}</th>
                                    <th>{{ __('leaveRequest.END DATE') }}</th>
                                    <th>{{ __('leaveRequest.TEAM') }}</th>
                                    <th>{{ __('leaveRequest.STATUS') }}</th>
                                    <th>{{ __('leaveRequest.ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaveRequests as $leaveRequest)
                                    <tr>
                                        <td>{{ $leaveRequest->id }}</td>
                                        <td>{{ $leaveRequest->user->fullname() }}</td>
                                        <td>{{ $leaveRequest->leaveType->name_en }}</td>
                                        <td>{{ $leaveRequest->number_of_days }}</td>
                                        <td>{{ date('d/m/Y', strtotime($leaveRequest->start_date)) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($leaveRequest->end_date)) }}</td>
                                        <td>{{ $leaveRequest->team->name }}</td>
                                        <td class="text-center">
                                            @if ($leaveRequest->status == 'Approved')
                                                <span
                                                    class="badge rounded-pill bg-success">{{ $leaveRequest->status }}</span>
                                            @elseif ($leaveRequest->status == 'pending')
                                                <span
                                                    class="badge rounded-pill bg-warning">{{ $leaveRequest->status }}</span>
                                            @else
                                                <span
                                                    class="badge rounded-pill bg-danger">{{ $leaveRequest->status }}</span>
                                            @endif
                                        </td>
                                        {{-- <td>{{ '' ?? date('d/m/Y H:i:s', strtotime($leaveRequest->workflowStageApprovals->where('treated_by', auth()->user()->id)->first()->updated_at)) }}
                                        </td> --}}
                                        <td>
                                            <a class="btn btn-info"
                                                data-bs-target="#leaveRequestDetail{{ $leaveRequest->id }}"
                                                data-bs-toggle="modal" href="javascript:void(0)">{{ __('Details') }}</a>
                                            @include('leave-requests.details')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('leave-requests.export-menu')
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/table-data.js') }}"></script>
@endsection
