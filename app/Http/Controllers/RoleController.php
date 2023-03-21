<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = new Role();
        $permissions = Permission::all();
        return view('roles.create', compact('role', 'permissions'));
    }

    /**
     * Store the specified resource.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:20|string|unique:roles,name,',
            'permissions.*' => 'required'
        ]);

        $role = Role::create(['name' => $validatedData['name']]);

        if (array_key_exists('permissions', $validatedData)) {
            $role->syncPermissions($validatedData['permissions']);
        }
        return to_route('roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role->with('permissions');
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:20|string|unique:roles,name,' . $role->id,
            'permissions.*' => 'required'
        ]);

        $role->update(['name' => $validatedData['name']]);
        $role->syncPermissions($validatedData['permissions']);
        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
