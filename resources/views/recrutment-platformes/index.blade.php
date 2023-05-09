@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('recrutment-platformes.index') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">{{ __('platforme.List of platformes') }}</h3>
                    <a href="{{ route('recrutment-platformes.create') }}"
                        class="btn btn-primary">{{ __('platforme.Add platforme') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table
                            class="table table-bordered text-nowrap key-buttons border-bottom w-100 dataTable no-footer dtr-inline"
                            id="file-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('platforme.PLATFORME NAME') }}</th>
                                    <th>{{ __('platforme.TOTAL EMPLOYEES') }}</th>
                                    <th>{{ __('platforme.ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recrutmentPlatformes as $platforme)
                                    <tr>
                                        <td>{{ $platforme->name }}</td>
                                        <td>{{ $platforme->users->count() }}</td>
                                        <td>
                                            <a href="{{ route('recrutment-platformes.edit', $platforme) }}"
                                                class="btn btn-cyan">{{ __('platforme.Edit') }}</a>
                                            <form class="d-inline-block"
                                                action="{{ route('recrutment-platformes.destroy', $platforme) }}"
                                                method="post">
                                                @csrf @method('delete')
                                                <button class="btn btn-danger" type="submit">{{ __('platforme.Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
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
