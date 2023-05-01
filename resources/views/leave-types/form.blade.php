@foreach (config('app.available_locale') as $locale)
    <div class="form-group mb-3">
        <label for="name_{{ $locale }}" class="form-label">{{ __('Leave type ') . strtoupper($locale) }}</label>
        <input type="text" class="form-control @error('name_' . $locale) is-invalid @enderror"
            id="name_{{ $locale }}" name="name_{{ $locale }}"
            value="{{ $leaveType->{'name_' . $locale} ?? old('name_' . $locale) }}"
            placeholder="{{ __('Enter leave type name...') }}">

        @error('name_' . $locale)
            <span>
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
    </div>
@endforeach

<div class="form-group mb-3">
    <label for="deductable" class="form-label">{{ __('Deductable') }}</label>
    <select name="deductable" id="deductable"
        class="form-control select2 form-select select2-hidden-accessible @error('deductable') is-invalid @enderror">
        <option value="">{{ __('Select a value') }}</option>
        <option value="{{ true }}"
            {{ $leaveType->deductable || old('deductable') == true ? 'selected' : '' }}>
            {{ __('YES') }}
        </option>
        <option value="{{ 0 }}"
            {{ $leaveType->deductable || old('deductable') == true ? '' : 'selected' }}>{{ __('NO') }}
        </option>
    </select>

    @error('deductable')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- @if (request()->routeIs('leaves.edit'))
    <input type="hidden" name="leave_id" value="{{ $leave->id }}">
@endif --}}
