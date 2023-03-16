@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('leave-types.index') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">{{ __('List of leave types') }}</h3>
                    <a href="{{ route('leave-types.create') }}" class="btn btn-primary">{{ __('Add leave type') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table
                            class="table table-bordered text-nowrap key-buttons border-bottom w-100 dataTable no-footer dtr-inline"
                            id="file-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('LEAVE TYPE NAME') }}</th>
                                    <th>{{ __('DEDUCTABLE') }}</th>
                                    <th>{{ __('ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaveTypes as $leaveType)
                                    <tr>
                                        <td>{{ $leaveType->name_en }}</td>
                                        <td>{{ $leaveType->deductable ? __('YES') : __('NO') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('leave-types.edit', $leaveType) }}"
                                                class="btn btn-cyan">{{ __('Edit') }}</a>
                                            <form class="d-inline-block"
                                                action="{{ route('leave-types.destroy', $leaveType) }}" method="post">
                                                @csrf @method('delete')
                                                <button class="btn btn-danger" type="submit">{{ __('Delete') }}</button>
                                            </form>
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
