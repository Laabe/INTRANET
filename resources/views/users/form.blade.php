<p class="mb-4 text-17">{{ __('employeeManagement.Personal Info') }}</p>

<div class="row mb-4">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="first_name" class="form-label">{{ __('employeeManagement.First name') }}(<span class="text-danger">*</span>)</label>
        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
            name="first_name" value="{{ old('first_name') ?? $user->first_name }}"
            placeholder="{{ __('employeeManagement.Enter first name') }}">

        @error('first_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="last_name" class="form-label">{{ __('employeeManagement.Last name') }}(<span class="text-danger">*</span>)</label>
        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
            name="last_name" value="{{ old('last_name') ?? $user->last_name }}"
            placeholder="{{ __('employeeManagement.Enter last name') }}">

        @error('last_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="gender_id" class="form-label">{{ __('employeeManagement.Gender') }}(<span class="text-danger">*</span>)</label>
        <select name="gender_id" id="gender_id"
            class="form-control select2 form-select select2-hidden-accessible @error('gender_id') is-invalid @enderror"
            data-placeholder="{{ __('employeeManagement.Select a gender') }}">
            <option value="">{{ __('employeeManagement.Select a gender') }}</option>
            @foreach ($genders as $gender)
                <option value="{{ $gender->id }}"
                    {{ old('gender_id') == $gender->id || $user->gender_id == $gender->id ? 'selected' : '' }}>
                    {{ $gender->{'name_' . app()->getLocale()} }}</option>
            @endforeach
        </select>

        @error('gender_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="date_of_birth" class="form-label">{{ __('employeeManagement.Date of birth') }}</label>
        <div class="input-group">
            <div id="datePickerStyle1" class="input-group date" data-date-format="yyyy-mm-dd">
                <span class="input-group-addon input-group-text bg-primary-transparent">
                    <i class="fe fe-calendar text-primary-dark"></i>
                </span>
                <input class="form-control @error('date_of_birth') is-invalid @enderror" id="bootstrapDatePicker1"
                    type="text" name="date_of_birth" value="{{ old('date_of_birth') ?? $user->date_of_birth }}"
                    placeholder="YYYY-MM-DD">
            </div>
        </div>

        @error('date_of_birth')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="marital_status_id" class="form-label">{{ __('employeeManagement.Marital Status') }}</label>
        <select name="marital_status_id" id="marital_status_id"
            class="form-control select2 form-select select2-hidden-accessible @error('marital_status_id') is-invalid @enderror"
            data-placeholder="{{ __('employeeManagement.Choose one') }}">
            <option value="">{{ __('employeeManagement.Choose one') }}</option>
            @foreach ($maritalStatuses as $status)
                <option value="{{ $status->id }}"
                    {{ old('marital_status_id') == $status->id || $user->marital_status_id == $status->id ? 'selected' : '' }}>
                    {{ $status->{'name_' . app()->getLocale()} }}</option>
            @endforeach
        </select>

        @error('marital_status_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="number_of_kids" class="form-label">{{ __('employeeManagement.Number of kids') }}</label>
        <input type="test" class="form-control @error('number_of_kids') is-invalid @enderror" name="number_of_kids"
            value="{{ old('number_of_kids') ?? $user->number_of_kids }}" id="number_of_kids"
            placeholder="{{ __('employeeManagement.Enter number of kids') }}">

        @error('number_of_kids')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="language_id" class="form-label">{{ __('employeeManagement.Language') }}</label>
        <select name="language_id" id="language_id"
            class="form-control select2 form-select select2-hidden-accessible @error('language_id') is-invalid @enderror"
            data-placeholder="{{ __('employeeManagement.Select a language') }}">
            <option value="">{{ __('employeeManagement.Select a language') }}</option>
            @foreach ($languages as $language)
                <option value="{{ $language->id }}"
                    {{ old('language_id') == $language->id || $user->language_id == $language->id ? 'selected' : '' }}>
                    {{ $language->{'name_' . app()->getLocale()} }}</option>
            @endforeach
        </select>

        @error('language_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="language_level_id" class="form-label">{{ __('employeeManagement.Language level') }}</label>
        <select name="language_level_id" id="language_level_id"
            class="form-control select2 form-select select2-hidden-accessible @error('language_level_id') is-invalid @enderror"
            data-placeholder="{{ __('employeeManagement.Select a level') }}">
            <option value="">{{ __('employeeManagement.Select a level') }}</option>
            @foreach ($languageLevels as $level)
                <option value="{{ $level->id }}"
                    {{ old('language_level_id') == $level->id || $user->language_level_id == $level->id ? 'selected' : '' }}>
                    {{ $level->name }}</option>
            @endforeach
        </select>

        @error('language_level_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="identity_document" class="form-label">{{ __('employeeManagement.Identity Document') }}(<span
            class="text-danger">*</span>)</label>
        <select name="identity_document_id" id="identity_document_id"
            class="form-control select2 form-select select2-hidden-accessible @error('identity_document_id') is-invalid @enderror"
            data-placeholder="{{ __('employeeManagement.Choose one') }}">
            <option value="">{{ __('employeeManagement.Choose one') }}</option>
            @foreach ($identityDocuments as $document)
                <option value="{{ $document->id }}"
                    {{ old('identity_document_id') == $document->id || $user->identity_document_id == $document->id ? 'selected' : '' }}>
                    {{ $document->{'name_' . app()->getLocale()} }}
                </option>
            @endforeach
        </select>

        @error('identity_document_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="integration_date" class="form-label">{{ __('employeeManagement.Integration Date') }}(<span
            class="text-danger">*</span>)</label>
        <div class="input-group">
            <div id="datePickerStyle1" class="input-group date" data-date-format="yyyy-mm-dd">
                <span class="input-group-addon input-group-text bg-primary-transparent">
                    <i class="fe fe-calendar text-primary-dark"></i>
                </span>
                <input class="form-control @error('integration_date') is-invalid @enderror" id="bootstrapDatePicker2"
                    type="text" name="integration_date"
                    value="{{ old('integration_date') ?? $user->integration_date }}" placeholder="YYYY-MM-DD">
            </div>
        </div>

        @error('integration_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="identity_document_number" class="form-label">{{ __('employeeManagement.Document Number') }}(<span
            class="text-danger">*</span>)</label>
        <input type="text" name="identity_document_number"
            value="{{ old('identity_document_number') ?? $user->identity_document_number }}"
            id="identity_document_number"
            class="form-control @error('identity_document_number') is-invalid @enderror"
            placeholder="{{ __('employeeManagement.Enter document number') }}">

        @error('identity_document_number')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="social_security_number" class="form-label">{{ __('employeeManagement.Social Security Number') }}(<span
            class="text-danger">*</span>)</label>
        <input type="text" name="social_security_number"
            value="{{ old('social_security_number') ?? $user->social_security_number }}" id="social_security_number"
            class="form-control @error('social_security_number') is-invalid @enderror"
            placeholder="{{ __('employeeManagement.Enter social security number') }}">

        @error('social_security_number')
            <strong>
                <span class="text-danger">{{ $message }}</span>
            </strong>
        @enderror
    </div>

    <div class="col-12 mb-3">
        <label for="image" class="form-label">{{ __('employeeManagement.Employee Image') }}</label>
        <input type="file" name="image" id="image" class="dropify @error('image') is-invalid @enderror">

        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

</div>

<p class="mb-4 text-17">{{ __('employeeManagement.Contact Info') }}</p>

<div class="row mb-4">

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="phone" class="form-label">{{ __('employeeManagement.Phone') }}</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') ?? $user->phone }}"
            class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('employeeManagement.Enter phone number') }}">

        @error('phone')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="email" class="form-label">{{ __('employeeManagement.Email') }}(<span
            class="text-danger">*</span>)</label>
        <input type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}"
            class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('employeeManagement.Enter email address') }}">

        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-12 mb-3">
        <label for="address" class="form-label">{{ __('employeeManagement.Address') }}</label>
        <textarea name="address" id="adress" cols="30" rows="2"
            class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('employeeManagement.Write here...') }}">{{ old('address') ?? $user->address }}</textarea>

        @error('address')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<p class="mb-4 text-17">{{ __('employeeManagement.Other Info') }}</p>

<div class="form-row">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="sourcing_type_id" class="form-label">{{ __('employeeManagement.Sourcing type') }}</label>
        <select name="sourcing_type_id" id="sourcing_type_id"
            class="form-control select2 form-select select2-hidden-accessible @error('sourcing_type_id') is-invalid @enderror"
            data-placeholder="{{ __('employeeManagement.Choose one') }}">
            <option value="">{{ __('employeeManagement.Choose one') }}</option>
            @foreach ($sourcings as $sourcing)
                <option value="{{ $sourcing->id }}"
                    {{ old('sourcing_type_id') == $sourcing->id || $user->sourcing_type_id == $sourcing->id ? 'selected' : '' }}>
                    {{ $sourcing->{'name_' . app()->getLocale()} }}</option>
            @endforeach
        </select>

        @error('sourcing_type_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
        <label for="recrutment_platforme_id" class="form-label">{{ __('employeeManagement.Professional Networks') }}</label>
        <select name="recrutment_platforme_id" id="recrutment_platforme_id"
            class="form-control select2 form-select select2-hidden-accessible @error('recrutment_platforme_id') is-invalid @enderror"
            data-placeholder="{{ __('employeeManagement.Choose one') }}">
            <option value="">{{ __('employeeManagement.Choose one') }}</option>
            @foreach ($recrutmentPlatformes as $platforme)
                <option value="{{ $platforme->id }}"
                    {{ old('recrutment_platforme_id') == $platforme->id || $user->recrutment_platforme_id == $platforme->id ? 'selected' : '' }}>
                    {{ $platforme->name }}</option>
            @endforeach
        </select>

        @error('recrutment_platforme_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

</div>
