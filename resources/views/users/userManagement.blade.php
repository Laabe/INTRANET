@extends('layouts.app')

@section('content')
    <div class="main-container container-fluid">
        {{ Breadcrumbs::render('users.index') }}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">
                            {{ __('List of employees') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table table-bordered key-buttons border-bottom w-100 dataTable no-footer dtr-inline"
                                id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th>{{ __('NAME') }}</th>
                                        <th>{{ __('EMPLOYEE ID') }}</th>
                                        <th>{{ __('PROFILE') }}</th>
                                        <th>{{ __('ROLE') }}</th>
                                        <th>{{ __('ACTION') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-end">
                                                    <span class="data-image avatar avatar-lg"
                                                        style="background-image: url({{ asset($user->image()) }}); border-radius: 10px"></span>
                                                    <div class="user-details ms-2">
                                                        <h6 class="mb-0">{{ $user->fullname() }}</h6>
                                                        <span class="text-muted fs-12">{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->profile->name_en ?? 'N/A' }}</td>
                                            <td>{{ $user->getRoleNames()->first() ?? 'N/A' }}</td>
                                            <td><a href="#" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#assignRole{{ $user->id }}">{{ __('Assign Role') }}</a>
                                            </td>
                                        </tr>
                                        @include('users.assignRoleModal')
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
