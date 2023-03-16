<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scenario extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Get the profile that owns the Scenario
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Get all of the workflowStages for the Scenario
     */
    public function workflowStages()
    {
        return $this->hasMany(WorkflowStage::class);
    }

    /**
     * Get all of the workflowStageApprovals for the Scenario
     */
    public function workflowStageApprovals()
    {
        return $this->hasManyThrough(WorkflowStageApproval::class, WorkflowStage::class);
    }
}
