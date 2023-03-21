@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('home') }}
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{ auth()->user()->paid_leaves_balance }}</h3>
                            <p class="text-muted fs-13 mb-0">{{ __('My Annual Leaves') }}</p>
                        </div>
                        <div class="col col-auto top-icn">
                            <div class="counter-icon ms-auto bg-success box-shadow-success">
                                <i class="icon icon-calendar text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{ auth()->user()->holidays_balance }}</h3>
                            <p class="text-muted fs-13 mb-0">{{ __('My Holidays') }}</p>
                        </div>
                        <div class="col col-auto top-icn">
                            <div class="counter-icon ms-auto bg-secondary box-shadow-secondary">
                                <i class="icon icon-event text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">
                                {{ auth()->user()->leaveRequests->where('status', 'pending')->count() }}</h3>
                            <p class=" fs-13 mb-0">{{ __('My Pending Requests') }}</p>
                        </div>
                        <div class="col col-auto top-icn">
                            <div class="counter-icon ms-auto bg-warning box-shadow-warning">
                                <i class="icon icon-hourglass text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
