<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Get the manager that owns the Department
     */
    public function manager()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the projects for the Department
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get all of the users for the Department
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
