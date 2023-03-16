<div class="form-group">
    <label for="name" class="form-label">{{ __('Project name') }}</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name') ?? $project->name }}" placeholder="Entrer nom du projet...">

    @error('name')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

@if (request()->routeIs('projects.edit'))
    <div class="row align-items-end">
        <div class="form-group col-6">
            <label for="image" class="form-label">{{ __('Project image') }}</label>
            <input type="file" class="dropify @error('image') is-invalid @enderror" id="image" name="image">

            @error('image')
                <span>
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-6">
            <img src="{{ asset($project->image()) }}">
        </div>
    </div>
@else
    <div class="form-group">
        <label for="image" class="form-label">{{ __('Project image') }}</label>
        <input type="file" class="dropify @error('image') is-invalid @enderror" id="image" name="image">

        @error('image')
            <span>
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
    </div>
@endif
