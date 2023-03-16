@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('roles.edit') }}
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <form action="{{ route('roles.update', $role) }}" method="post" class="form-horizontal" autocomplete="off">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Add Role</h3>
                    </div>
                    <div class="card-body">
                        @csrf @method('put')
                        @include('roles.form')
                    </div>
                    <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                        <button class="btn btn-warning btn-block" type="submit">Save</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-dark btn-block">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
