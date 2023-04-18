<?php

use App\Http\Controllers\AwardBadgeController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RecrutmentPlatformeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScenarioController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn () => auth()->guest() ? view('auth.login') : to_route('home'));

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('leave-requests/my-leave-requests', [LeaveRequestController::class, 'myLeaveRequests'])->name('leave-requests.my-leave-requests');
    Route::resource('leave-requests', LeaveRequestController::class)->only('create', 'store', 'destroy');

    Route::middleware(['role_or_permission:HR|Admin'])->group(function () {
        // Users Routes
        Route::post('users/inject-holidays/store', [UserController::class, 'injectHolidays'])->name('users.inject-holidays-balance');
        Route::get('users/inject-holidays', [UserController::class, 'holidaysInjectionPage'])->name('users.inject-holidays');
        Route::get('users/deleted', [userController::class, 'deleted'])->name('users.deleted');
        Route::post('users/{id}/restore', [userController::class, 'restore'])->name('users.restore');
        Route::delete('users/{id}/force-delete', [userController::class, 'forceDelete'])->name('users.force-delete');
        Route::resource('users', UserController::class);
        Route::put('users/{user}/assign-department', [UserController::class, 'assignDepartment'])->name('users.assign-department');
        Route::put('users/{user}/assign-profile', [UserController::class, 'assignProfile'])->name('users.assign-profile');
        Route::put('users/{user}/assign-project', [UserController::class, 'assignProject'])->name('users.assign-project');
        Route::put('users/{user}/assign-manager', [UserController::class, 'assignManager'])->name('users.assign-manager');
        Route::get('api/users', [UserController::class, 'getUsers'])->name('api.users');
    });

    Route::middleware(['role_or_permission:Admin|Settings Management'])->group(function () {
        // language routes
        Route::resource('languages', LanguageController::class)->except('show');
        // Profile routes
        Route::resource(
            'profiles',
            ProfileController::class
        );
        // Department Routes
        Route::resource('departments', DepartmentController::class);
        Route::put('departments/{department}/assign-manager', [DepartmentController::class, 'assignManager'])->name('departments.assign-manager');
        // Project Routes
        Route::resource(
            'projects',
            ProjectController::class
        );
        Route::put('projects/{project}/assign-manager', [ProjectController::class, 'assignManager'])->name('projects.assign-manager');
        // Recrutment platformes Routes
        Route::resource('recrutment-platformes', RecrutmentPlatformeController::class);
        // Leave Types and leave requests Routes
        Route::resource('leave-types', LeaveTypeController::class)->except('show');
        // Scenario and workflow Routes
        Route::get('scenarios/profile/{profile}', [ScenarioController::class, 'show'])->name('scenarios.show');
        Route::resource('scenarios', ScenarioController::class)->except('show');

        Route::prefix('user-management')->group(function () {
            Route::resource('roles', RoleController::class);
            Route::resource('permissions', PermissionController::class)->only('index', 'create', 'store');
            Route::get('users', [UserController::class, 'userManagement'])->name('user-management.users');
            Route::post('users/assign-role', [UserController::class, 'assignRole'])->name('user-management.assign-role');
        });
    });

    Route::middleware(['role_or_permission:WFM'])->group(function () {
        Route::get('leave-requests/consulte-requests', [LeaveRequestController::class, 'consulteRequests'])->name('leave-requests.consulte');
        Route::put('leave-requests/consulte-requests/{id}', [LeaveRequestController::class, 'updatedConsultationStatus'])->name('leave-requests.update-consulte');
    });

    Route::middleware(['role_or_permission:Leave Request Management|Admin'])->group(function () {
        Route::post('leave-requests/export', [LeaveRequestController::class, 'exportExcel'])->name('leave-requests.export');
        Route::get('leave-requests/history', [LeaveRequestController::class, 'history'])->name('leave-requests.history');
        Route::put('leave-requests/{id}/approve', [LeaveRequestController::class, 'approveLeaveRequest'])->name('leave-requests.approve');
        Route::put('leave-requests/{id}/reject', [LeaveRequestController::class, 'rejectLeaveRequest'])->name('leave-requests.reject');
        Route::resource('leave-requests', LeaveRequestController::class)->except('create', 'store', 'destroy', 'myLeaveRequests');
    });

    Route::middleware(['role_or_permission:Team Management|Admin'])->group(function () {
        // Teams Routes
        Route::post('teams/{team}/assign-users', [TeamController::class, 'assignUsers'])->name('teams.assign-users');
        Route::resource('teams', TeamController::class);
    });

    Route::resource('award-badges', AwardBadgeController::class);
    Route::resource('awards', AwardController::class);
});
