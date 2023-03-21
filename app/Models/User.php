<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPermissions, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image()
    {
        $image = $this->image ? $this->image : 'default-profile.jpg';
        return 'employees_image/' . $image;
    }

    public function fullname()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the department that owns the User
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the profile that owns the User
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Get the project that owns the User
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the manager that owns the User
     */
    public function manager()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the manages for the User
     */
    public function manages()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the sourcingType that owns the User
     */
    public function sourcingType()
    {
        return $this->belongsTo(SourcingType::class);
    }

    /**
     * Get the recrutmentPlatform that owns the User
     */
    public function recrutmentPlatform()
    {
        return $this->belongsTo(RecrutmentPlatforme::class, 'id', 'recrutment_platforme_id');
    }

    /**
     * Get the gender that owns the User
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * Get the maritalStatus that owns the User
     */
    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    /**
     * The teams that belong to the User
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * Get all of the leaveRequests for the User
     */
    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
