@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('users.inject-holidays') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('users.inject-holidays-balance') }}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="card-header border-bottom justify-content-between">
                        <h3 class="card-title">{{ __('Inject Holiday balance') }}</h3>
                        <a href="{{ route('users.index') }}" class="btn btn-primary">{{ __('Return') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="excel-file" class="form-label">{{ __('Excel File') }}</label>
                            <input type="file" name="excel-file" id="excel-file" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button type="submit" class="btn btn-success btn-block">{{ __('Inject') }}</button>
                        <a href="{{ route('home') }}" class="btn btn-dark btn-block">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
