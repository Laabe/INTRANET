<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkflowStageApproval extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['user'];

    /**
     * Get the workflowStage that owns the WorkflowStageApprovals
     */
    public function workflowStage()
    {
        return $this->belongsTo(WorkflowStage::class);
    }

    /**
     * Get the leaveRequest that owns the WorkflowStageApproval
     */
    public function leaveRequest()
    {
        return $this->belongsTo(LeaveRequest::class);
    }
    
    /**
     * Get the user that owns the WorkflowStageApproval
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'treated_by');
    }
}
