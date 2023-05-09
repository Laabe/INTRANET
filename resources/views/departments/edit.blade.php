@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('departments.edit') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('departments.update', $department) }}" method="post" class="form-horizontal"
                    autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('department.Modify department') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf @method('put')
                        @include('departments.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-warning btn-block" type="submit">{{ __('department.Save') }}</button>
                        <a href="{{ route('departments.index') }}" class="btn btn-dark btn-block">{{ __('department.Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
