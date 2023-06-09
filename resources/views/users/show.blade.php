@extends('layouts.app')

@section('content')
    <div class="main-container container-fluid">
        {{ Breadcrumbs::render('users.show') }}
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12 col-xl-6">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="profile-img-main rounded">
                                        <img src="{{ asset($user->image()) }}" alt="img" class="m-0 p-1 hrem-6"
                                            style="border-radius: 15px">
                                    </div>
                                    <div class="ms-4">
                                        <h4>{{ $user->fullname() }}</h4>
                                        <p class="text-muted mb-2">{{ $user->email }}</p>
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-edit"></i>
                                            {{ __('employeeManagement.Edit') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-xl-6">
                                <div class="d-md-flex flex-wrap justify-content-lg-end">
                                    <div class="media m-3">
                                        <div class="media-icon bg-azure me-3 mt-1">
                                            <i class="icon icon-calendar fs-20 text-white"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">{{ __('employeeManagement.Annual Leaves') }}</span>
                                            <div class="fw-semibold fs-25">
                                                {{ $user->paid_leaves_balance }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media m-3">
                                        <div class="media-icon bg-secondary me-3 mt-1">
                                            <i class="icon icon-event  fs-20 text-white"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">{{ __('employeeManagement.Holidays') }}</span>
                                            <div class="fw-semibold fs-25">
                                                {{ $user->holidays_balance }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media m-3">
                                        <div class="media-icon bg-success me-3 mt-1">
                                            <i class="icon icon-hourglass fs-20 text-white"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">{{ __('employeeManagement.Pending Requests') }}</span>
                                            <div class="fw-semibold fs-25">
                                                {{ $user->leaveRequests->where('status', 'pending')->count() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12 col-sm-12 col-lg-6">
                <div class="card ">
                    <div class="card-header border-bottom">
                        <div class="card-title">{{ __('employeeManagement.Personal Info') }}</div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-bs-toggle="card-collapse">
                                <i class="fe fe-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col-3">
                                <p class="fw-bold">{{ __('employeeManagement.Date of birth') }}</p>
                                <p class="fw-bold">{{ __('employeeManagement.Gender') }} </p>
                                <p class="fw-bold">{{ __('employeeManagement.Phone') }} </p>
                                <p class="fw-bold">{{ __('employeeManagement.Address') }} </p>
                                <p class="fw-bold">{{ __('employeeManagement.Marital Status') }} </p>
                                {{-- <p class="fw-bold">{{ __('employeeManagement.Number of kids') }} </p> --}}
                            </div>
                            <div class="col-9">
                                <p>{{ date('d/m/Y', strtotime($user->date_of_birth)) }}</p>
                                <p>{{ $user->gender->{'name_' . app()->getLocale()} }}</p>
                                <p>{{ $user->phone }}</p>
                                <p>{{ $user->address }}</p>
                                <p>{{ $user->maritalStatus->{'name_' . app()->getLocale()} }}</p>
                                {{-- <p>{{ $user->number_of_kids }}</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 col-sm-12 col-lg-6">
                <div class="card ">
                    <div class="card-header border-bottom">
                        <div class="card-title">{{ __('employeeManagement.Professional Information') }}</div>
                        <div class="card-options">
                            <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse">
                                <i class="fe fe-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col-4">
                                <p class="fw-bold">{{ __('employeeManagement.Integration Date') }} </p>
                                <p class="fw-bold">{{ __('employeeManagement.Employee ID') }} </p>
                                <p class="fw-bold">{{ __('employeeManagement.Department') }} </p>
                                <p class="fw-bold">{{ __('employeeManagement.Title') }} </p>
                                <p class="fw-bold">{{ __('employeeManagement.Project') }} </p>
                                {{-- <p class="fw-bold">{{ __('employeeManagement.Reports to') }} </p> --}}
                            </div>
                            <div class="col-8">
                                <p>{{ date('d/m/Y', strtotime($user->integration_date)) }}</p>
                                <p>{{ $user->id }}</p>
                                @if ($user->department)
                                    <p>{{ $user->department->name_en }}
                                        <a class="mx-5" href="javascript:void(0)"
                                            data-bs-target="#assignDepartmentModal{{ $user->id }}"
                                            data-bs-toggle="modal">{{ __('employeeManagement.Change') }}</a>
                                    </p>
                                @else
                                    <p>{{ 'N/A' }}
                                        <a class="mx-5" href="javascript:void(0)"
                                            data-bs-target="#assignDepartmentModal{{ $user->id }}"
                                            data-bs-toggle="modal">{{ __('employeeManagement.Assign') }}
                                        </a>
                                    </p>
                                @endif
                                @if ($user->profile)
                                    <p>{{ $user->profile->name_en }}
                                        <a class="mx-5" href="javascript:void(0)"
                                            data-bs-target="#assignProfileModal{{ $user->id }}"
                                            data-bs-toggle="modal">{{ __('employeeManagement.Change') }}
                                        </a>
                                    </p>
                                @else
                                    <p>{{ 'N/A' }}
                                        <a class="mx-5" href="javascript:void(0)"
                                            data-bs-target="#assignProfileModal{{ $user->id }}"
                                            data-bs-toggle="modal">{{ __('employeeManagement.Assign') }}
                                        </a>
                                    </p>
                                @endif
                                @if ($user->project)
                                    <p>{{ $user->project->name }}
                                        <a class="mx-5" href="javascript:void(0)"
                                            data-bs-target="#assignProjectModal{{ $user->id }}"
                                            data-bs-toggle="modal">{{ __('employeeManagement.Change') }}
                                        </a>
                                    </p>
                                @else
                                    <p>{{ 'N/A' }}
                                        <a class="mx-5" href="javascript:void(0)"
                                            data-bs-target="#assignProjectModal{{ $user->id }}"
                                            data-bs-toggle="modal">{{ __('employeeManagement.Assign') }}
                                        </a>
                                    </p>
                                @endif
                                {{-- @if ($user->manager)
                                    <p>{{ $user->manager->fullname() }} <a class="mx-5" href="javascript:void(0)"
                                            data-bs-target="#assignManagerModal{{ $user->id }}"
                                            data-bs-toggle="modal">{{ __('employeeManagement.Change') }}</a></p>
                                @else
                                    <p>{{ 'N/A' }} <a class="mx-5" href="javascript:void(0)"
                                            data-bs-target="#assignManagerModal{{ $user->id }}"
                                            data-bs-toggle="modal">{{ __('employeeManagement.Assign') }}</a></p>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('users.assignDepartmentModal')
    @include('users.assignProfileModal')
    @include('users.assignProjectModal')
    @include('users.assignManagerModal')
@endsection


@section('scripts')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
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
