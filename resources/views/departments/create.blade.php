@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('departments.create') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('departments.store') }}" method="post" class="form-horizontal" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('department.Add department') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf
                        @include('departments.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('department.Save') }}</button>
                        <a href="{{ route('departments.index') }}" class="btn btn-dark btn-block">{{ __('department.Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
