@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('award-badges.edit') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('award-badges.update', $awardBadge) }}" method="post" class="form-horizontal"
                    enctype="multipart/form-data" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('Edit award badge') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf @method('put')
                        @include('award-badges.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-warning btn-block" type="submit">{{ __('Save') }}</button>
                        <a href="{{ route('award-badges.index') }}" class="btn btn-dark btn-block">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>
@endsection
