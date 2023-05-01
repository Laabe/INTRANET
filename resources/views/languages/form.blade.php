@foreach (config('app.available_locale') as $locale)
<div class="form-group mb-3">
    <label for="name{{ $locale }}" class="form-label">{{ __('Language name ') . strtoupper($locale) }}</label>
    <input type="text" class="form-control @error('name_' . $locale) is-invalid @enderror" id="name_{{ $locale }}" name="name_{{ $locale }}"
        value="{{ old('name_' . $locale) ?? $language->{'name_' . $locale} }}" placeholder="{{ __('Enter language name...') }}">

    @error('name_' . $locale)
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
@endforeach

