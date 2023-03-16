@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('leave-requests.index') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">{{ __('My leave requests') }}</h3>
                    <a href="{{ route('leave-requests.create') }}" class="btn btn-primary">{{ __('Request a leave') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('LEAVE TYPE') }}</th>
                                    <th>{{ __('REQUESTED DAYS') }}</th>
                                    <th>{{ __('START DATE') }}</th>
                                    <th>{{ __('END DATE') }}</th>
                                    <th>{{ __('STATUS') }}</th>
                                    <th>{{ __('ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaveRequests as $leaveRequest)
                                    <tr>
                                        <td>{{ $leaveRequest->leaveType->name_en }}</td>
                                        <td>{{ $leaveRequest->number_of_days }}</td>
                                        <td>{{ date('d/m/Y', strtotime($leaveRequest->start_date)) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($leaveRequest->end_date)) }}</td>
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
                                                <form action="{{ route('leave-requests.destroy', $leaveRequest) }}"
                                                    method="post" class="d-inline-block">
                                                    @csrf @method('delete')
                                                    <button class="btn btn-danger">{{ __('Cancel') }}</button>
                                                </form>
                                            @endif
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
