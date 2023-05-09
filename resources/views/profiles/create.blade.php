@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('profiles.create') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('profiles.store') }}" method="post" class="form-horizontal" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('profile.Add profile') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf
                        @include('profiles.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('profile.Save') }}</button>
                        <a href="{{ route('profiles.index') }}" class="btn btn-dark btn-block">{{ __('profile.Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
