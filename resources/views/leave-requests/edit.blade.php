@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('leave-requests.edit') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('leave-requests.update', $leaveRequest) }}" method="post" class="form-horizontal" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Modify leave request</h3>
                    </div>
                    <div class="card-body">
                        @csrf @method('put')
                        @include('leave-requests.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-warning btn-block" type="submit">Save</button>
                        <a href="{{ route('home') }}" class="btn btn-dark btn-block">Cancel</a>
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
@endsection