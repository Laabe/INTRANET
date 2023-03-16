<div class="form-group mb-3">
    <label for="name_fr" class="form-label">{{ __('Leave type in french') }}</label>
    <input type="text" class="form-control @error('name_fr') is-invalid @enderror" id="name_fr" name="name_fr"
        value="{{ old('name_fr') ?? $leaveType->name_fr }}" placeholder="{{ __('Enter leave type name...') }}">

    @error('name_fr')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="name_en" class="form-label">{{ __('Leave type in english') }}</label>
    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en"
        value="{{ old('name_en') ?? $leaveType->name_en }}" placeholder="{{ __('Enter leave type name...') }}">

    @error('name_en')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="name_de" class="form-label">{{ __('Leave type in dutch') }}</label>
    <input type="text" class="form-control @error('name_de') is-invalid @enderror" id="name_de" name="name_de"
        value="{{ old('name_de') ?? $leaveType->name_de }}" placeholder="{{ __('Enter leave type name...') }}">

    @error('name_de')
        <span>
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

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
