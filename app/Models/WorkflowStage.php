<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkflowStage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the workflowStageApprovals for the WorkflowStages
     */
    public function workflowStageApproval()
    {
        return $this->hasOne(WorkflowStageApproval::class);
    }

    /**
     * Get the approvedBy that owns the WorkflowStages
     */
    public function approvedBy()
    {
        return $this->belongsTo(Profile::class, 'approver_profile_id', 'id');
    }
}
