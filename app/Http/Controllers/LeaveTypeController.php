<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use App\Http\Requests\StoreLeaveTypeRequest;
use App\Http\Requests\UpdateLeaveTypeRequest;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaveTypes = LeaveType::all();
        return view('leave-types.index', compact('leaveTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leaveType = new LeaveType();
        return view('leave-types.create', compact('leaveType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveTypeRequest $request)
    {
        LeaveType::create($request->validated());
        return to_route('leave-types.index')->with('success', __('Leave type addded successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveType $leaveType)
    {
        return view('leave-types.show', compact('leaveType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveType $leaveType)
    {
        return view('leave-types.edit', compact('leaveType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeaveType $leaveType)
    {
        $leaveType->update($request->validate([
            'name_fr' => 'required|string|max:30|unique:leave_types,name_fr,' . $leaveType->id,
            'name_en' => 'required|string|max:30|unique:leave_types,name_en,' . $leaveType->id,
            'name_de' => 'required|string|max:30|unique:leave_types,name_de,' . $leaveType->id,
            'deductable' => 'required|boolean',
        ]));
        return to_route('leave-types.index')->with('success', 'Leave type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveType $leaveType)
    {
        $leaveType->delete();
        return to_route('leave-types.index')->with('success', 'Leave type deleted successfully');
    }
}
