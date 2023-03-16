<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Get the teamLeader that owns the Team
     */
    public function teamLeader()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the users for the Team
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the department that owns the Team
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the project that owns the Team
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get all of the leaveRequests for the Team
     */
    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
