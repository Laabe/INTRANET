<div class="form-group mb-3">
    <label for="name" class="form-label">{{ __('Role Name') }}</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        placeholder="Enter role name..." value="{{ old('name') ?? $role->name }}">

    @error('name')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
<hr>
<h5 class="mb-5">{{ __('Role Permission') }}</h5>
<div class="row">
    @forelse ($permissions as $key => $permission)
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
            <label class="ckbox" for="{{ $permission->id }}">
                <input type="checkbox" id="{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}"
                    {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }}>
                <span>{{ $permission->name }}</span>
            </label>
        </div>
    @empty
        <p class="text-center">{{ __('No Permission Found') }}</p>
    @endforelse
</div>
