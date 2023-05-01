<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $managerProfileId = Profile::where('name_en', 'like', '%Department manager%')->first()->id;
        $managers = User::where('profile_id', $managerProfileId)->get();
        return view('departments.index', compact('departments', 'managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = new Department();
        return view('departments.create', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->validated());
        return to_route('departments.index')->with('success', __('Department Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());
        return to_route('departments.index')->with('success', __('Department Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return to_route('departments.index')->with('success', __('Department Deleted Successfully'));
    }

    /**
     * Assign a manager to the specified resource from storage.
     */

    public function assignManager(Request $request, Department $department)
    {
        $managerValidatedData = $request->validate(['manager_id' => 'required|numeric']);
        $department->update($managerValidatedData);
        return to_route('departments.index')->with('success', __('Manager Assigned Successfully'));
    }
}
