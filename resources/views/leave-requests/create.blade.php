@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('leave-requests.create') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('leave-requests.store') }}" method="post" class="form-horizontal" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('Create leave request') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf
                        @include('leave-requests.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('Save') }}</button>
                        <a href="{{ route('leave-requests.index') }}" class="btn btn-dark btn-block">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-alert.js') }}"></script>

    <script>
        @if (session('error'))
            swal({
                title: "OOPS!!!",
                text: "{{ session('error') }}",
                type: "error",
                icon: "error"
            })
        @endif
    </script>
@endsection
