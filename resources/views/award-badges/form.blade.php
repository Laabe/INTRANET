<div class="mb-3">
    <label for="name" class="form-label">{{ _('Award badge name:') }}</label>
    <input type="text" class="form-control" name="name" id="name"
        placeholder="{{ __('Enter award badge name...') }}" value="{{ old('name') ?? $awardBadge->name }}">

    @error('name')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">{{ _('Award badge description:') }}</label>
    <textarea name="description" id="description" cols="30" rows="3" class="form-control"
        placeholder="{{ __('Write Here..') }}">{{ old('name') ?? $awardBadge->description }}</textarea>

    @error('description')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

@if (request()->routeIs('award-badges.edit'))
    <div class="row align-items-end mb-3">
        <div class="form-group col-6">
            <label for="image" class="form-label">{{ __('Award badge image') }}</label>
            <input type="file" class="dropify @error('image') is-invalid @enderror" id="image" name="image">

            @error('image')
                <span>
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-6 text-center">
            <img src="{{ asset($awardBadge->image()) }}" width="210">
        </div>
    </div>
@else
    <div class="form-group">
        <label for="image" class="form-label">{{ __('Award badge image') }}</label>
        <input type="file" class="dropify @error('image') is-invalid @enderror" id="image" name="image">

        @error('image')
            <span>
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
    </div>
@endif
