<div class="row">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 mb-3">
        <label for="leave_type_id" class="form-label">{{ __('Leave Type') }}</label>
        <select name="leave_type_id" id="leave_type_id"
            class="form-control select2 form-select select2-hidden-accessible @error('leave_type_id') is-invalid @enderror"
            data-placeholder="Select an option">
            <option value="">{{ __('Select an option') }}</option>
            @foreach ($leaveTypes as $leaveType)
                <option value="{{ $leaveType->id }}"
                    {{ old('leave_type_id') == $leaveType->id || $leaveRequest->leave_type_id == $leaveType->id ? 'selected' : '' }}>
                    {{ $leaveType->name_en }}</option>
            @endforeach
        </select>

        @error('leave_type_id')
            <span class="text-danger fw-bold">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <label for="number_of_days" class="form-label">Number of days</label>
        <input class="form-control" id="number_of_days" name="number_of_days" placeholder="Enter number of days"
            type="text" value="{{ $leaveRequest->number_of_days ?? old('number_of_days') }}">

        @error('number_of_days')
            <span class="text-danger fw-bold">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="start_date" class="form-label">{{ __('Start date') }}</label>
        <div class="input-group">
            <div id="datePickerStyle1" class="input-group date" data-date-format="yyyy-mm-dd">
                <span class="input-group-addon input-group-text bg-primary-transparent">
                    <i class="fe fe-calendar text-primary-dark"></i>
                </span>
                <input class="form-control @error('start_date') is-invalid @enderror" id="bootstrapDatePicker1"
                    type="text" name="start_date" value="{{ old('start_date') ?? $leaveRequest->start_date }}"
                    placeholder="YYYY-MM-DD">
            </div>
        </div>

        @error('start_date')
            <span class="text-danger fw-bold">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="end_date" class="form-label">{{ __('End date') }}</label>
        <div class="input-group">
            <div id="datePickerStyle1" class="input-group date" data-date-format="yyyy-mm-dd">
                <span class="input-group-addon input-group-text bg-primary-transparent">
                    <i class="fe fe-calendar text-primary-dark"></i>
                </span>
                <input class="form-control @error('end_date') is-invalid @enderror" id="bootstrapDatePicker2"
                    type="text" name="end_date" value="{{ old('end_date') ?? $leaveRequest->end_date }}"
                    placeholder="YYYY-MM-DD">
            </div>
        </div>

        @error('end_date')
            <span class="text-danger fw-bold">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <label for="leave_request_motive" class="form-label">{{ __('Comment') }}</label>
        <textarea name="leave_request_motive" id="leave_request_motive" cols="30" rows="5" class="form-control"
            placeholder="{{ __('Write Here...') }}"></textarea>

        @error('leave_request_motive')
            <span class="text-danger fw-bold">{{ $message }}</span>
        @enderror
    </div>
</div>
