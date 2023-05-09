<div class="form-group mb-5">
    <label for="profile_id" class="form-label">{{ __('Scenario for profile') }}</label>
    <select name="profile_id" id="profile_id" class="form-control @error('profile_id') is-invalid @enderror"
        data-placeholder="{{ __('scenario.Select a profile') }}">
        <option value="">{{ __('scenario.Select a profile') }}</option>
        @foreach ($profiles as $profile)
            <option value="{{ $profile->id }}" {{ old('profile_id') == $profile->id ? 'selected' : '' }}>
                {{ $profile->{'name_' . app()->getLocale()} }}</option>
        @endforeach
    </select>

    @error('profile_id')
        <strong>
            <span class="text-danger">{{ $message }}</span>
        </strong>
    @enderror
</div>

<p class="mb-4 text-14">{{ __('scenario.Workflow of the scenario') }}</p>

@foreach ($approvers as $index => $approver)
    <div class="row align-items-end">
        <div class="col-12 mb-3">
            <label for="approvers[{{ $index }}][id]"
                class="form-label">{{ __('scenario.Approver N° ') . $index + 1 }}</label>
            <select name="approvers[{{ $index }}][id]" id="approvers[{{ $index }}][id]"
                class="form-control @error("approvers[{{ $index }}][id]") is-invalid @enderror">
                <option value="">{{ __('scenario.Select a profile') }}</option>
                @foreach ($profiles as $profile)
                    <option value="{{ $profile->id }}">{{ $profile->{'name_' . app()->getLocale()} }}</option>
                @endforeach
            </select>

            @error("approvers[{{ $index }}][id]")
                <strong>
                    <span class="text-danger">{{ $message }}</span>
                </strong>
            @enderror
        </div>

        {{-- <div class="col-2 mb-3">
            <label class="ckbox" for="approvers[{{ $index }}][teamate]" class="form-label">
                <input type="checkbox" id="approvers[{{ $index }}][teamate]"
                    name="approvers[{{ $index }}][teamate]">
                <span>{{ __('Teamate') }}</span>
            </label>
        </div> --}}
    </div>
@endforeach

@if ($count < 5)
    <div class="row">
        <div class="col-12 mb-3">
            <button class="btn btn-secondary" wire:click.prevent="addApprover">{{ __('scenario.Add approver') }}</button>
        </div>
    </div>
@endif
