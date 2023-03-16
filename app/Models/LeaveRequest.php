<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Get the leaveType that owns the LeaveRequest
     */
    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }

    /**
     * Get all of the workflowStageApprovals for the LeaveRequest
     */
    public function workflowStageApprovals()
    {
        return $this->hasMany(WorkflowStageApproval::class);
    }

    public function previousWorkflowStageApproval()
    {
        return $this->hasOne(WorkflowStageApproval::class)
            ->orderByDesc('id')
            ->skip(
                WorkflowStageApproval::where('leave_request_id', $this->id)->where('status', 'pending')->count()
            );
    }

    /**
     * Get all of the workflowStages for the LeaveRequest
     */
    public function workflowStages()
    {
        return $this->hasMany(WorkflowStage::class);
    }


    /**
     * Get the user that owns the LeaveRequest
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the team that owns the LeaveRequest
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
