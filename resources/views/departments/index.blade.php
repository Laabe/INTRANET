@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('departments.index') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">{{ __('department.List of departments') }}</h3>
                    <a href="{{ route('departments.create') }}" class="btn btn-primary">{{ __('department.Add department') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table
                            class="table table-bordered text-nowrap key-buttons border-bottom w-100 dataTable no-footer dtr-inline"
                            id="file-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('department.DEPARTMENT') }}</th>
                                    <th>{{ __('department.DEPARTMENT MANAGER') }}</th>
                                    {{-- <th>{{ __('TOTAL EMPLOYEES') }}</th> --}}
                                    <th>{{ __('department.ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $department->{'name_' .app()->getLocale()} }}</td>
                                        <td>{{ $department->manager->name ?? 'N/A' }}</td>
                                        {{-- <td>0</td> --}}
                                        <td>
                                            <a href="javascript:void(0)"
                                                data-bs-target="#assignManagerModal{{ $department->id }}"
                                                data-bs-toggle="modal" class="btn btn-dark">{{ __('department.Assign Manager') }}</a>
                                            <a href="{{ route('departments.edit', $department) }}"
                                                class="btn btn-warning">{{ __('department.Edit') }}</a>
                                            <form class="d-inline-block"
                                                action="{{ route('departments.destroy', $department) }}" method="post">
                                                @csrf @method('delete')
                                                <button class="btn btn-danger" type="submit">{{ __('department.Delete') }}</button>
                                            </form>

                                        </td>
                                    </tr>
                                    @include('departments.assignManagerModal')
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
    <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>

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
