@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('projects.index') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">{{ __('project.List of projects') }}</h3>
                    <a href="{{ route('projects.create') }}" class="btn btn-primary">{{ __('project.Add project') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table
                            class="table table-bordered text-nowrap key-buttons border-bottom w-100 dataTable no-footer dtr-inline"
                            id="file-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('project.PROJECT') }}</th>
                                    <th>{{ __('project.PROJECT MANAGER') }}</th>
                                    <th>{{ __('project.ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->projectManager ? $project->projectManager->fullname() : 'N/A' }}
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                data-bs-target="#assignManagerModal{{ $project->id }}"
                                                data-bs-toggle="modal" class="btn btn-dark">{{ __('project.Assign Manager') }}</a>
                                            <a href="{{ route('projects.edit', $project) }}"
                                                class="btn btn-cyan">{{ __('project.Edit') }}</a>
                                            <form class="d-inline-block" action="{{ route('projects.destroy', $project) }}"
                                                method="post">
                                                @csrf @method('delete')
                                                <button class="btn btn-danger" type="submit">{{ __('project.Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('projects.assignManagerModal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>

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
