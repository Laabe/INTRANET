<div class="form-group mb-3">
    <label for="name" class="form-label">{{ __('platforme.Platforme name ') }}</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name') ?? $recrutmentPlatforme->name }}" placeholder="{{ __('platforme.Enter platforme name...') }}">

    @error('name')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
