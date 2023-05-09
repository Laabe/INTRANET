@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('leave-requests.balance-tracker') }}
    <div class="main-container container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">
                            {{ __('leaveRequest.List of paid leaves and holidays records') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table table-bordered key-buttons border-bottom w-100 dataTable no-footer dtr-inline"
                                id="responsive-datatable">
                                <thead>
                                    <tr>
                                        <th>{{ __('leaveRequest.ACTION DATE') }}</th>
                                        <th>{{ __('leaveRequest.MADE BY') }}</th>
                                        <th>{{ __('leaveRequest.COMMENT') }}</th>
                                        <th>{{ __('leaveRequest.PAID LEAVES BALANCE') }}</th>
                                        <th>{{ __('leaveRequest.HOLIDAYS BALANCE') }}</th>
                                        <th>{{ __('leaveRequest.TOTAL BALANCE') }}</th>
                                        <th>{{ __('leaveRequest.DETAILS') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $record)
                                        <tr>
                                            <td>{{ $record->created_at }}</td>
                                            <td>{{ $record->actionBy->fullname() }}</td>
                                            <td>{{ $record->comment }}</td>
                                            <td>
                                                {{ $record->paid_leaves_balance }}
                                                @if ($record->deducted_paid_leaves != 0)
                                                    <span
                                                        class="icn-box {{ $record->deducted_paid_leaves > 0 ? 'text-danger' : 'text-success' }} fw-semibold fs-13 me-1">
                                                        <i
                                                            class="fa {{ $record->deducted_paid_leaves > 0 ? 'fa-long-arrow-down' : 'fa-long-arrow-up' }}"></i>
                                                        {{ $record->deducted_paid_leaves }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $record->holidays_balance }}
                                                @if ($record->deducted_holidays != 0)
                                                    <span
                                                        class="icn-box {{ $record->deducted_holidays > 0 ? 'text-danger' : 'text-success' }} fw-semibold fs-13 me-1">
                                                        <i
                                                            class="fa {{ $record->deducted_holidays > 0 ? 'fa-long-arrow-down' : 'fa-long-arrow-up' }}"></i>
                                                        {{ $record->deducted_holidays }}
                                                    </span>
                                                @endif
                                                @if ($record->added_holidays > 0)
                                                    <span class="icn-box text-success fw-semibold fs-13 me-1">
                                                        <i class="fa fa-long-arrow-up"></i>
                                                        {{ $record->added_holidays }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $record->paid_leaves_balance + $record->holidays_balance }}
                                            </td>
                                            <td>
                                                @if (strpos(strtolower($record->comment), strtolower('leave')) !== false)
                                                    <a class="btn btn-info"
                                                        data-bs-target="#actionDetail{{ $record->leaveRequest->id }}"
                                                        data-bs-toggle="modal"
                                                        href="javascript:void(0)">{{ __('leaveRequest.Details') }}</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @if (strpos(strtolower($record->comment), strtolower('leave')) !== false)
                                            @include('leave-requests.action-details')
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
@endsection
