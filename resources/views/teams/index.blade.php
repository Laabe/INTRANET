@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('teams.index') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">{{ __('team.List of teams') }}</h3>
                    <a href="{{ route('teams.create') }}" class="btn btn-primary">{{ __('team.Create Team') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100 dataTable no-footer dtr-inline" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('team.TEAM NAME') }}</th>
                                    <th>{{ __('team.DEPARTMENT') }}</th>
                                    <th>{{ __('team.PROJECT') }}</th>
                                    <th>{{ __('team.TEAM LEADER') }}</th>
                                    <th>{{ __('team.TOTAL EMPLOYEES') }}</th>
                                    <th>{{ __('team.ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->department->{'name_' . app()->getlocale()} }}</td>
                                        <td>{{ $team->project ? $team->project->name : 'N/A' }}</td>
                                        <td>{{ $team->teamLeader->fullname() }}</td>
                                        <td>{{ $team->users->count() }}</td>
                                        <td>
                                            <a href="{{ route('teams.edit', $team) }}"
                                                class="btn btn-cyan">{{ __('team.Edit') }}</a>
                                            <form action="{{ route('teams.destroy', $team) }}" method="post"
                                                class="d-inline-block">
                                                @csrf @method('delete')
                                                <button class="btn btn-danger">{{ __('team.Delete') }}</button>
                                            </form>
                                            <a href="#" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#assignUsers{{ $team->id }}">{{ __('team.Associate employees') }}</a>
                                        </td>
                                    </tr>
                                    @include('teams.assignUsersModal')
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
