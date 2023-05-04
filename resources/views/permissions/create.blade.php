@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('permissions.create') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('permissions.store') }}" method="post" class="form-horizontal" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('userManagement.Add permission') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf
                        @include('permissions.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-primary btn-block" type="submit">Save</button>
                        <a href="{{ route('permissions.index') }}" class="btn btn-dark btn-block">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
