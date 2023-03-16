<div class="form-group mb-3">
    <label for="name_de" class="form-label">{{ __('Department Name in french') }}</label>
    <input type="text" class="form-control @error('name_fr') is-invalid @enderror" id="name_fr" name="name_fr"
        value="{{ old('name_fr') ?? $department->name_fr }}" placeholder="{{ __('Enter department name...') }}">

    @error('name_fr')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="name_en" class="form-label">{{ __('Department Name in english') }}</label>
    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en"
        value="{{ old('name_en') ?? $department->name_en }}" placeholder="{{ __('Enter department name...') }}">

    @error('name_en')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="name_de" class="form-label">{{ __('Department Name in dutch') }}</label>
    <input type="text" class="form-control @error('name_de') is-invalid @enderror" id="name_de" name="name_de"
        value="{{ old('name_de') ?? $department->name_de }}" placeholder="{{ __('Enter department name...') }}">

    @error('name_de')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
