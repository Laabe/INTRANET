@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('leave-requests.index') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">{{ __('leaveRequest.My leave requests') }}</h3>
                    <a href="{{ route('leave-requests.create') }}" class="btn btn-primary">{{ __('leaveRequest.Request a leave') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100 dataTable no-footer dtr-inline" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('leaveRequest.LEAVE TYPE') }}</th>
                                    <th>{{ __('leaveRequest.REQUESTED DAYS') }}</th>
                                    <th>{{ __('leaveRequest.START DATE') }}</th>
                                    <th>{{ __('leaveRequest.END DATE') }}</th>
                                    <th>{{ __('leaveRequest.STATUS') }}</th>
                                    <th>{{ __('leaveRequest.ACTION') }}</th>
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
                                            @if ($leaveRequest->status == 'pending' || ($leaveRequest->status == 'Approved' && $leaveRequest->start_date <= now()))
                                                <form action="{{ route('leave-requests.destroy', $leaveRequest) }}" id="delete-form-{{ $leaveRequest->id }}"
                                                    method="post" class="d-inline-block">
                                                    @csrf @method('delete')
                                                    <a class="btn btn-danger" href="javascript:void(0)" onclick="deleteItem({{ $leaveRequest->id }})">{{ __('Cancel') }}</a>
                                                    <input type="hidden" name="id" value="{{ $leaveRequest->id }}">
                                                </form>
                                            @endif
                                            <a class="btn btn-info" data-bs-target="#leaveRequestDetail{{ $leaveRequest->id }}" data-bs-toggle="modal" href="javascript:void(0)">Details</a>
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

        @if (session('error'))
            swal({
                title: "OOPS!!!",
                text: "{{ session('error') }}",
                type: "error",
                icon: "error"
            })
        @endif
    </script>

<script>
    function deleteItem(id) {
        swal({
		  title: "Are you sure?",
		  text: "You will not be able to revert it",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Yes, cancel it!",
		  cancelButtonText: "cancel !",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm) {
		  if (isConfirm) {
            document.getElementById('delete-form-' + id).submit();
		  }
		});
    }
</script>

@endsection
