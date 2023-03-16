@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('scenarios.show') }}
    <div class="card-columns">
        @foreach ($scenarios as $scenario)
            <div class="card">
                <div
                    class="card-header border-bottom {{ $scenario->primary ? 'bg-primary' : '' }} d-flex justify-content-between">
                    <h4 class="card-title fw-semibold">{{ $scenario->name }}</h4>
                    @if (!$scenario->primary)
                        <form action="" method="post">
                            @csrf @method('put')
                            <button class="btn btn-primary">{{ __('Set as default') }}</button>
                        </form>
                    @endif
                </div>
                <div class="card-body pb-0">
                    <ul class="task-list">
                        @foreach ($scenario->workflowStages as $workflowStage)
                            <li>
                                <i class="task-icon bg-primary"></i>
                                <p class="fw-semibold fs-13">{{ $workflowStage->approvedBy->name_en }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/table-data.js') }}"></script>

    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-alert.js') }}"></script>

    <script>
        @if (session('success'))
            swal({
                title: "Congratulations!!!",
                text: "{{ session('success') }}",
                type: "success",
                icon: "success"
            })
        @endif
    </script>
@endsection
