<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function image()
    {
        $image = $this->image ? $this->image : 'default_project.jpg';
        return 'projects_image/' . $image;
    }

    /**
     * Get the department that owns the Project
     */
    public function department()
    {
        return $this->belongsTo(Department::class)
            ->where('name_en', 'like', '%Production%')
            ->orWhere('name_fr', 'like', 'Production')
            ->orWhere('name_de', 'like', '%Productie%');
    }

    /**
     * Get the project manager that owns the Project
     */
    public function projectManager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * Get all of the users for the Project
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
