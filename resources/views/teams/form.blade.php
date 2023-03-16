<div class="form-group mb-4">
    <label for="name" class="form-label">{{ __('Team Name') }}</label>
    <input class="form-control" id="name" name="name" placeholder="{{ __('Enter team name...') }}" type="text"
        value="{{ $team->name ?? old('name') }}">

    @error('name')
        <small class="text-danger fw-bold">{{ $message }}</small>
    @enderror
</div>

<div class="form-group mb-4">
    <label for="department_id" class="form-label">{{ __('Departement') }}</label>
    <select name="department_id" id="department_id"
        class="form-control select2-show-search form-select select2-hidden-accessible @error('department_id') is-invalid @enderror"
        data-placeholder="{{ __('Select a department') }}">
        <option value="">{{ __('Select a department') }}</option>
        @foreach ($departments as $department)
            <option value="{{ $department->id }}"
                {{ old('department_id') || $team->department_id == $department->id ? 'selected' : '' }}>
                {{ $department->name_en }}</option>
        @endforeach
    </select>

    @error('department_id')
        <small class="text-danger fw-bold">{{ $message }}</small>
    @enderror
</div>

<div class="form-group mb-4">
    <label for="project_id" class="form-label">{{ __('Projet') }}</label>
    <select name="project_id" id="project_id"
        class="form-control select2-show-search form-select select2-hidden-accessible @error('project_id') is-invalid @enderror"
        data-placeholder="{{ __('Select a project') }}">
        <option value="">{{ __('Select a project') }}</option>
        @foreach ($projects as $project)
            <option value="{{ $project->id }}"
                {{ old('project_id') || $team->project_id == $project->id ? 'selected' : '' }}>
                {{ $project->name }}</option>
        @endforeach
    </select>

    @error('project_id')
        <small class="text-danger fw-bold">{{ __('The project is required when department is Production') }}</small>
    @enderror
</div>

<div class="form-group mb-4">
    <label for="team_leader_id" class="form-label">{{ __('Team Leader') }}</label>
    <select name="team_leader_id" id="team_leader_id"
        class="form-control select2-show-search form-select select2-hidden-accessible @error('team_leader_id') is-invalid @enderror"
        data-placeholder="{{ __('Select a team leader') }}">
        <option value="">{{ __('Select a team leader') }}</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                {{ old('team_leader_id') || $team->team_leader_id == $user->id ? 'selected' : '' }}>
                {{ $user->fullname() }}</option>
        @endforeach
    </select>

    @error('team_leader_id')
        <small class="text-danger fw-bold">{{ $message }}</small>
    @enderror
</div>
