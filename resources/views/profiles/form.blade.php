@foreach (config('app.available_locale') as $locale)
    <div class="form-group mb-3">
        <label for="name_{{ $locale }}" class="form-label">{{ __('Profile name ') . strtoupper($locale) }}</label>
        <input type="text" class="form-control @error('name_' . $locale) is-invalid @enderror"
            id="name_{{ $locale }}" name="name_{{ $locale }}"
            value="{{ old('name_' . $locale) ?? $profile->{'name_' . $locale} }}"
            placeholder="{{ __('Enter profile name...') }}">

        @error('name_' . $locale)
            <span>
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
    </div>
@endforeach
