@extends('layouts.app')

@section('content')
    <div class="main-container container-fluid">
        {{ Breadcrumbs::render('users.create') }}
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('users.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-header border-bottom">
                            <div class="card-title">
                                {{ __('employeeManagement.Add employee') }}
                            </div>
                        </div>
                        <div class="card-body">
                            @csrf
                            @include('users.form')
                        </div>
                        <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                            <button class="btn btn-primary btn-block" type="submit">{{ __('employeeManagement.Save') }}</button>
                            <a href="{{ route('users.index') }}" class="btn btn-dark btn-block">{{ __('employeeManagement.Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>
    <script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
@endsection
