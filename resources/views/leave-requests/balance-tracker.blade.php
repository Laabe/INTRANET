@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('leave-requests.balance-tracker') }}
    <div class="main-container container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">
                            {{ __('List of paid leaves and holidays records') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table table-bordered key-buttons border-bottom w-100 dataTable no-footer dtr-inline"
                                id="responsive-datatable">
                                <thead>
                                    <tr>
                                        <th>{{ __('ACTION DATE') }}</th>
                                        <th>{{ __('CREATOR') }}</th>
                                        <th>{{ __('COMMENT') }}</th>
                                        <th>{{ __('PAID LEAVES BALANCE') }}</th>
                                        <th>{{ __('HOLIDAYS BALANCE') }}</th>
                                        <th>{{ __('TOTAL BALANCE') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $records)
                                        <tr>
                                            <td>{{ $records->created_at }}</td>
                                            <td>{{ $records->user->fullname() }}</td>
                                            <td>{{ $records->comment }}</td>
                                            <td>
                                                {{ $records->paid_leaves_balance }}
                                                @if ($records->deducted_paid_leaves != 0)
                                                    <span
                                                        class="icn-box {{ $records->deducted_paid_leaves > 0 ? 'text-danger' : 'text-success' }} fw-semibold fs-13 me-1">
                                                        <i
                                                            class="fa {{ $records->deducted_paid_leaves > 0 ? 'fa-long-arrow-down' : 'fa-long-arrow-up' }}"></i>
                                                        {{ $records->deducted_paid_leaves }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $records->holidays_balance }}
                                                @if ($records->deducted_holidays != 0)
                                                    <span
                                                        class="icn-box {{ $records->deducted_holidays > 0 ? 'text-danger' : 'text-success' }} fw-semibold fs-13 me-1">
                                                        <i
                                                            class="fa {{ $records->deducted_holidays > 0 ? 'fa-long-arrow-down' : 'fa-long-arrow-up' }}"></i>
                                                        {{ $records->deducted_holidays }}
                                                    </span>
                                                @endif
                                                @if ($records->added_holidays > 0)
                                                    <span class="icn-box text-success fw-semibold fs-13 me-1">
                                                        <i class="fa fa-long-arrow-up"></i>
                                                        {{ $records->added_holidays }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $records->paid_leaves_balance + $records->holidays_balance }}
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
