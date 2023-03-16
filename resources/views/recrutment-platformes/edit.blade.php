@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('recrutment-platformes.edit') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('recrutment-platformes.update', $recrutmentPlatforme) }}" method="post"
                    class="form-horizontal" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('Modify recrutment platforme') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf @method('put')
                        @include('recrutment-platformes.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-warning btn-block" type="submit">{{ _('Save') }}</button>
                        <a href="{{ route('recrutment-platformes.index') }}"
                            class="btn btn-dark btn-block">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
