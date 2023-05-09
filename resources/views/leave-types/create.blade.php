@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('leave-types.create') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('leave-types.store') }}" method="post" class="form-horizontal" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('leaveType.Add leave type') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf
                        @include('leave-types.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('leaveType.Save') }}</button>
                        <a href="{{ route('leave-types.index') }}" class="btn btn-dark btn-block">{{ __('leaveType.Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>
@endsection
