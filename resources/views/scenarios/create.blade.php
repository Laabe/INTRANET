@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('scenarios.create') }}
    <livewire:scenario-workflow :scenario="$scenario" />
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>
@endsection
