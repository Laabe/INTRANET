@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('teams.index') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">{{ __('List of teams') }}</h3>
                    <a href="{{ route('teams.create') }}" class="btn btn-primary">{{ __('Create Team') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100 dataTable no-footer dtr-inline" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('TEAM NAME') }}</th>
                                    <th>{{ __('TEAM LEADER') }}</th>
                                    <th>{{ __('PROJECT') }}</th>
                                    <th>{{ __('TOTAL OF EMPLOYES') }}</th>
                                    <th>{{ __('ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->teamLeader->fullname() }}</td>
                                        <td>{{ $team->department->name_en }}</td>
                                        <td>{{ $team->users->count() }}</td>
                                        <td>
                                            <a href="{{ route('teams.edit', $team) }}"
                                                class="btn btn-cyan">{{ __('Edit') }}</a>
                                            <form action="{{ route('teams.destroy', $team) }}" method="post"
                                                class="d-inline-block">
                                                @csrf @method('delete')
                                                <button class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                            <a href="#" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#assignUsers{{ $team->id }}">{{ __('Associate
                                                                                                employees') }}</a>
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
