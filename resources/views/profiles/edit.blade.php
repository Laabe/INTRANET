@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('profiles.edit') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('profiles.update', $profile) }}" method="post" class="form-horizontal"
                    autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('Modify profile') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf @method('put')
                        @include('profiles.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-warning btn-block" type="submit">{{ _('Save') }}</button>
                        <a href="{{ route('profiles.index') }}" class="btn btn-dark btn-block">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
