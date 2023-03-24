<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
// use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Languages
Breadcrumbs::for('languages.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Languages'), route('languages.index'));
});

// Home > Languages > Create Language
Breadcrumbs::for('languages.create', function ($trail) {
    $trail->parent('languages.index');
    $trail->push(__('Add language'), route('languages.create'));
});

// Home > Languages > Edit Language
Breadcrumbs::for('languages.edit', function ($trail) {
    $trail->parent('languages.index');
    $trail->push(__('Edit language'), route('languages.edit', 'language'));
});

// Home > Profiles
Breadcrumbs::for('profiles.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('profiles'), route('profiles.index'));
});

// Home > Profiles > Create Language
Breadcrumbs::for('profiles.create', function ($trail) {
    $trail->parent('profiles.index');
    $trail->push(__('Add profile'), route('profiles.create'));
});

// Home > Profiles > Edit Language
Breadcrumbs::for('profiles.edit', function ($trail) {
    $trail->parent('profiles.index');
    $trail->push(__('Edit profile'), route('profiles.edit', 'profile'));
});

// Home > Profiles > Show Language
Breadcrumbs::for('profiles.show', function ($trail) {
    $trail->parent('profiles.index');
    $trail->push(__('Show profile details'), route('profiles.show', 'profile'));
});

// Home > Departments
Breadcrumbs::for('departments.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Departments'), route('departments.index'));
});

// Home > Departments > Create Language
Breadcrumbs::for('departments.create', function ($trail) {
    $trail->parent('departments.index');
    $trail->push(__('Add department'), route('departments.create'));
});

// Home > Departments > Edit Language
Breadcrumbs::for('departments.edit', function ($trail) {
    $trail->parent('departments.index');
    $trail->push(__('Edit department'), route('departments.edit', 'department'));
});

// Home > Departments > Show Language
Breadcrumbs::for('departments.show', function ($trail) {
    $trail->parent('departments.index');
    $trail->push(__('Show department details'), route('Departments.show', 'department'));
});

// Home > Projects
Breadcrumbs::for('projects.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Projects'), route('projects.index'));
});

// Home > Projects > Create Language
Breadcrumbs::for('projects.create', function ($trail) {
    $trail->parent('projects.index');
    $trail->push(__('Add project'), route('projects.create'));
});

// Home > Projects > Edit Language
Breadcrumbs::for('projects.edit', function ($trail) {
    $trail->parent('projects.index');
    $trail->push(__('Edit project'), route('projects.edit', 'project'));
});

// Home > Projects > Show Language
Breadcrumbs::for('projects.show', function ($trail) {
    $trail->parent('projects.index');
    $trail->push(__('Show project details'), route('projects.show', 'project'));
});

// Home > recrutment-platformes
Breadcrumbs::for('recrutment-platformes.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Recrutment platformes'), route('recrutment-platformes.index'));
});

// Home > recrutment-platformes > Create Language
Breadcrumbs::for('recrutment-platformes.create', function ($trail) {
    $trail->parent('recrutment-platformes.index');
    $trail->push(__('Add recrutment platforme'), route('recrutment-platformes.create'));
});

// Home > recrutment-platformes > Edit Language
Breadcrumbs::for('recrutment-platformes.edit', function ($trail) {
    $trail->parent('recrutment-platformes.index');
    $trail->push(__('Edit recrutment platforme'), route('recrutment-platformes.edit', 'recrutment-platforme'));
});

// Home > recrutment-platformes > Show Language
Breadcrumbs::for('recrutment-platformes.show', function ($trail) {
    $trail->parent('recrutment-platformes.index');
    $trail->push(__('Show recrutment platforme details'), route('recrutment-platformes.show', 'recrutment-platforme'));
});

// Home > Employees
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Employees'), route('users.index'));
});

// Home > users > Create Employee
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push(__('Add employee'), route('users.create'));
});

// Home > users > Edit Employee
Breadcrumbs::for('users.edit', function ($trail) {
    $trail->parent('users.index');
    $trail->push(__('Edit employee'), route('users.edit', 'user'));
});

// Home > users > Show Employee
Breadcrumbs::for('users.show', function ($trail) {
    $trail->parent('users.index');
    $trail->push(__('Employee details'), route('users.show', 'user'));
});

// Home > Users > Deleted users
Breadcrumbs::for('users.deleted', function ($trail) {
    $trail->parent('users.index');
    $trail->push('Deleted employees', route('users.deleted'));
});

// Home > Leave types
Breadcrumbs::for('leave-types.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Leave types'), route('users.index'));
});

// Home > leave-types > Create leave type
Breadcrumbs::for('leave-types.create', function ($trail) {
    $trail->parent('leave-types.index');
    $trail->push(__('Add leave type'), route('leave-types.create'));
});

// Home > leave-types > Edit leave type
Breadcrumbs::for('leave-types.edit', function ($trail) {
    $trail->parent('leave-types.index');
    $trail->push(__('Edit leave type'), route('leave-types.edit', 'leave-type'));
});

// Home > Leave types
Breadcrumbs::for('teams.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Teams'), route('users.index'));
});

// Home > teams > Create leave type
Breadcrumbs::for('teams.create', function ($trail) {
    $trail->parent('teams.index');
    $trail->push(__('Create team'), route('teams.create'));
});

// Home > teams > Edit leave type
Breadcrumbs::for('teams.edit', function ($trail) {
    $trail->parent('teams.index');
    $trail->push(__('Edit team'), route('teams.edit', 'team'));
});

// Home > Scenario
Breadcrumbs::for('scenarios.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Scenarios'), route('scenarios.index'));
});

// Home > Scenario > Create scenario
Breadcrumbs::for('scenarios.create', function ($trail) {
    $trail->parent('scenarios.index');
    $trail->push(__('Add Scenarios'), route('scenarios.create'));
});

// Home > Scenario > Edit scenario
Breadcrumbs::for('scenarios.edit', function ($trail) {
    $trail->parent('scenarios.index');
    $trail->push(__('Scenarios'), route('scenarios.edit'));
});

// Home > Scenario > Show scenarios
Breadcrumbs::for('scenarios.show', function ($trail) {
    $trail->parent('scenarios.index');
    $trail->push(__('Show scenarios'), route('scenarios.show', 'profile'));
});

// Home > leave request
Breadcrumbs::for('leave-requests.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('leave-requests'), route('leave-requests.index'));
});

// Home > leave-requests > Create scenario
Breadcrumbs::for('leave-requests.create', function ($trail) {
    $trail->parent('leave-requests.index');
    $trail->push(__('Submit leave-requests'), route('leave-requests.create'));
});


// Dashboard > roles
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Roles', route('roles.index'));
});

// Dashboard > roles > Create Role
Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('roles.index');
    $trail->push('Create Role', route('roles.create'));
});

// Dashboard > roles > edit Role
Breadcrumbs::for('roles.edit', function ($trail) {
    $trail->parent('roles.index');
    $trail->push('Edit Role', route('roles.edit', 'role'));
});

// Dashboard > permissions
Breadcrumbs::for('permissions.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Permissions', route('permissions.index'));
});

// Dashboard > permissions > Create Permission
Breadcrumbs::for('permissions.create', function ($trail) {
    $trail->parent('permissions.index');
    $trail->push('Create Permission', route('permissions.create'));
});

// Dashboard > award-badges
Breadcrumbs::for('award-badges.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Award badges', route('award-badges.index'));
});

// Dashboard > award-badges > Create award-badge
Breadcrumbs::for('award-badges.create', function ($trail) {
    $trail->parent('award-badges.index');
    $trail->push('Create award badge', route('award-badges.create'));
});

// Dashboard > award-badges > edit award-badge
Breadcrumbs::for('award-badges.edit', function ($trail) {
    $trail->parent('award-badges.index');
    $trail->push('Edit award badge', route('award-badges.edit', 'awardBadge'));
});