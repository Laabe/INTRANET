<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $managerProfileId = Profile::where('name_en', 'like', '%Projet manager%')
            ->orWhere('name_fr', 'like', '%Responsable de projet%')
            ->orWhere('name_de', 'like', '%Projectleider%')
            ->first()->id;
        $managers = User::where('profile_id', $managerProfileId)->get();
        return view('projects.index', compact('projects', 'managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        if ($request->hasFile('image')) {
            $imageName = $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('projects_image'), $imageName);
            $image = ImageManagerStatic::make(public_path("projects_image/{$imageName}"))->resize(1100, 550);
            $image->save();
            Project::create(array_merge(
                $request->validated(),
                ['image' => $imageName]
            ));
        } else {
            Project::create($request->validated());
        }

        return to_route('projects.index')->with('success', __('Project added successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        if ($request->hasFile('image')) {
            // Remove old image from storage
            unlink(public_path("projects_image/{$project->image}"));

            // Rename new image and store it
            $imageName = $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('projects_image'), $imageName);
            $image = ImageManagerStatic::make(public_path("projects_image/{$imageName}"))->resize(1100, 550);
            $image->save();
            $project->update(array_merge(
                $request->validated(),
                ['image' => $imageName]
            ));
        } else {
            $project->update($request->validated());
        }

        return to_route('projects.index')->with('success', __('Project updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete Image from storage if it exists
        if ($project->image) {
            unlink(public_path("projects_image/{$project->image}"));
        }

        $project->delete();
        return to_route('projects.index')->with('success', __('Project deleted successfully'));
    }

    /**
     * Assign a manager to the specified resource from storage.
     */

     public function assignManager(Request $request, Project $project)
     {
         $managerValidatedData = $request->validate(['manager_id' => 'required|numeric']);
         $project->update($managerValidatedData);
         return to_route('projects.index')->with('success', __('Manager Assigned Successfully'));
     }
}
