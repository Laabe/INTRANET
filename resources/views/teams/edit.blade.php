@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('teams.edit') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('teams.update', $team) }}" method="post" class="form-horizontal" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('Edit team') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf @method('put')
                        @include('teams.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-warning btn-block" type="submit">{{ __('Save') }}</button>
                        <a href="{{ route('teams.index') }}" class="btn btn-dark btn-block">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>
@endsection
