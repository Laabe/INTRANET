@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('languages.create') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('languages.store') }}" method="post" class="form-horizontal" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('language.Add language') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf
                        @include('languages.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('language.Save') }}</button>
                        <a href="{{ route('languages.index') }}" class="btn btn-dark btn-block">{{ __('language.Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
