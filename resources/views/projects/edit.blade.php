@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('projects.edit') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('projects.update', $project) }}" method="post" class="form-horizontal"
                    enctype="multipart/form-data" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">{{ __('project.Modify project') }}</h3>
                    </div>
                    <div class="card-body">
                        @csrf @method('put')
                        @include('projects.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-warning btn-block" type="submit">{{ __('project.Save') }}</button>
                        <a href="{{ route('projects.index') }}" class="btn btn-dark btn-block">{{ __('project.Cancel') }}</a>
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
