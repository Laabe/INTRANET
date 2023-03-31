@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('leave-requests.index') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">{{ __('List of leave requests') }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>{{ 'ID' }}</th>
                                    <th>{{ 'EMPLOYEE' }}</th>
                                    <th>{{ 'LEAVE TYPE' }}</th>
                                    <th>{{ 'REQUESTED DAYS' }}</th>
                                    <th>{{ 'START DATE' }}</th>
                                    <th>{{ 'END DATE' }}</th>
                                    <th>{{ 'TEAM' }}</th>
                                    <th>{{ 'STATUS' }}</th>
                                    <th>{{ 'ACTION' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaveRequests as $leaveRequest)
                                    <tr>
                                        <td>{{ $leaveRequest->id }}</td>
                                        <td>{{ $leaveRequest->user->fullname() }}</td>
                                        <td>{{ $leaveRequest->leaveType->name_en }}</td>
                                        <td>{{ $leaveRequest->number_of_days }}</td>
                                        <td>{{ $leaveRequest->start_date }}</td>
                                        <td>{{ $leaveRequest->end_date }}</td>
                                        <td>{{ $leaveRequest->team->name }}</td>
                                        <td class="text-center">
                                            @if ($leaveRequest->status == 'pending')
                                                <span
                                                    class="badge rounded-pill bg-warning">{{ $leaveRequest->status }}</span>
                                            @elseif ($leaveRequest->status == 'Approved')
                                                <span
                                                    class="badge rounded-pill bg-success">{{ $leaveRequest->status }}</span>
                                            @else
                                                <span
                                                    class="badge rounded-pill bg-danger">{{ $leaveRequest->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($leaveRequest->status == 'pending')
                                                <form action="{{ route('leave-requests.approve', $leaveRequest->id) }}"
                                                    method="post" class="d-inline-block">
                                                    @csrf @method('put')
                                                    <button class="btn btn-primary">{{ __('Approve') }}</button>
                                                </form>
                                                <form action="{{ route('leave-requests.reject', $leaveRequest->id) }}"
                                                    method="post" class="d-inline-block">
                                                    @csrf @method('put')
                                                    <button class="btn btn-danger">{{ __('Reject') }}</button>
                                                </form>
                                            @endif
                                            <a class="btn btn-primary" data-bs-target="#leaveRequestDetail{{ $leaveRequest->id }}" data-bs-toggle="modal" href="javascript:void(0)">Details</a>
                                        </td>
                                        @include('leave-requests.details')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/table-data.js') }}"></script>

    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-alert.js') }}"></script>

    <script>
        @if (session('success'))
            swal({
                title: "Congratulations!!!",
                text: "{{ session('success') }}",
                type: "success",
                icon: "success"
            })
        @endif
    </script>
@endsection
