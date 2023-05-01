@extends('layouts.app')

@section('content')
    <div class="main-container container-fluid">
        {{ Breadcrumbs::render('users.index') }}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">
                            {{ request()->routeIs('users.index') ? __('List of employees') : __('List of deleted employees') }}
                        </h3>
                        <div>
                            @if (request()->routeIs('users.deleted'))
                                <a class="btn btn-primary" href="{{ route('users.create') }}">
                                    {{ __('Add Employee') }}
                                </a>
                                <a class="btn btn-dark" href="{{ route('users.index') }}">
                                    {{ __('Return') }}
                                </a>
                            @else
                                <a class="btn btn-primary" href="{{ route('users.create') }}">
                                    {{ __('Add Employee') }}
                                </a>
                                <a class="btn btn-dark" href="{{ route('users.deleted') }}">
                                    {{ __('Deleted Employee') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table table-bordered key-buttons border-bottom w-100 dataTable no-footer dtr-inline"
                                id="responsive-datatable">
                                <thead>
                                    <tr>
                                        <th>{{ __('EMPLOYEE ID') }}</th>
                                        <th>{{ __('NAME') }}</th>
                                        <th>{{ __('PROFILE') }}</th>
                                        <th>{{ __('PAID LEAVES BALANCE') }}</th>
                                        <th>{{ __('HOLIDAYS BALANCE') }}</th>
                                        <th>{{ request()->routeIs('users.index') ? __('INTEGRATION DATE') : __('TERMINATION DATE') }}
                                        </th>
                                        <th>{{ __('ACTION') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
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
                                            <td>{{ $user->profile->{'name_' . app()->getLocale()} ?? 'N/A' }}</td>
                                            <td>{{ $user->paid_leaves_balance }}</td>
                                            <td>{{ $user->holidays_balance }}</td>
                                            <td>
                                                {{ request()->routeIs('users.index') ? date('d/m/Y', strtotime($user->integration_date)) : date('d/m/Y', strtotime($user->deleted_at)) }}
                                            </td>
                                            @if (request()->routeIs('users.index'))
                                                <td>
                                                    <div class="d-flex align-items-stretch">
                                                        <a class="btn btn-outline-info border me-2" data-bs-toggle="tooltip"
                                                            href="{{ route('users.show', $user) }}"
                                                            data-bs-original-title="{{ __('Show Details') }}">
                                                            <i class="fa fa-info"></i>
                                                        </a>
                                                        <a class="btn btn-outline-danger border me-2"href="javascript:void(0)"
                                                            class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteUser{{ $user->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                @include('users.deleteUserModal')
                                            @else
                                                <td>
                                                    <form action="{{ route('users.restore', $user) }}" method="post"
                                                        class="d-inline-block">
                                                        @csrf
                                                        <button class="btn btn-warning"
                                                            type="submit">{{ __('Restore') }}</button>
                                                    </form>
                                                    <form action="{{ route('users.force-delete', $user) }}" method="post"
                                                        class="d-inline-block">
                                                        @csrf @method('delete')
                                                        <button class="btn btn-danger"
                                                            type="submit">{{ __('Force Delete') }}</button>
                                                    </form>
                                                </td>
                                            @endif
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
