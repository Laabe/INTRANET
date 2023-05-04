<div class="form-group mb-3">
    <label for="name" class="form-label">{{ __('userManagement.Permission name') }}</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name') }}" placeholder="Enter permission name...">

    @error('name')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
