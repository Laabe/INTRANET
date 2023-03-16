<div class="row">
    <div class="col-8 offset-2">
        <div class="card">
            <form action="{{ route('scenarios.store') }}" method="post" class="form-horizontal" autocomplete="off">
                <div class="card-header border-bottom">
                    <h3 class="card-title">{{ __('Add scenario') }}</h3>
                </div>
                <div class="card-body">
                    @csrf
                    @include('scenarios.form')
                </div>
                <div class="card-footer d-flex align-items-baseline btn-group mb-1">
                    <button class="btn btn-primary btn-block" type="submit">{{ _('Save') }}</button>
                    <a href="{{ route('scenarios.index') }}" class="btn btn-dark btn-block">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
