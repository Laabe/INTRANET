@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('users.inject-holidays') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('users.inject-holidays-balance') }}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="card-header border-bottom justify-content-between">
                        <h3 class="card-title">{{ __('employeeManagement.Inject Holiday balance') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 mb-3">
                                <label for="holiday_name" class="form-label">{{ __('employeeManagement.Holiday') }}</label>
                                <input type="text" name="holiday_name" id="holiday_name" class="form-control" placeholder="{{ __('employeeManagement.Type holiday name...') }}">
                        
                                @error('holiday_name')
                                    <span class="text-danger fw-bold">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <label for="number_of_days" class="form-label">{{ __('employeeManagement.Date of the Holiday') }}</label>
                                <div class="input-group">
                                    <div id="datePickerStyle1" class="input-group date" data-date-format="yyyy-mm-dd">
                                        <span class="input-group-addon input-group-text bg-primary-transparent">
                                            <i class="fe fe-calendar text-primary-dark"></i>
                                        </span>
                                        <input class="form-control @error('holiday_date') is-invalid @enderror" id="bootstrapDatePicker1"
                                            type="text" name="holiday_date" value="{{ old('holiday_date') }}"
                                            placeholder="YYYY-MM-DD">
                                    </div>
                                </div>
                        
                                @error('holiday_date')
                                    <span class="text-danger fw-bold">{{ $message }}</span>
                                @enderror
                        
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="excel-file" class="form-label">{{ __('employeeManagement.Excel File') }}</label>
                            <input type="file" name="excel-file" id="excel-file" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button type="submit" class="btn btn-success btn-block">{{ __('employeeManagement.Inject') }}</button>
                        <a href="{{ route('home') }}" class="btn btn-dark btn-block">{{ __('employeeManagement.Cancel') }}</a>
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