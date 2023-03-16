<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkflowStageApproval extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the workflowStage that owns the WorkflowStageApprovals
     */
    public function workflowStage()
    {
        return $this->belongsTo(WorkflowStage::class);
    }
}
