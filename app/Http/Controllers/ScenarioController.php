<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScenarioRequest;
use App\Models\Profile;
use App\Models\Scenario;
use App\Models\WorkflowStage;
use App\Models\WorkflowStages;
use Illuminate\Http\Request;

class ScenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('scenarios.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $scenario = new Scenario();
        return view('scenarios.create', compact('scenario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScenarioRequest $request)
    {
        $scenarioCounts = Scenario::all()->count();
        $validatedScenarioWorkflow = $request->validated();
        $scenario = Scenario::create([
            'name' => 'Scenario ' . $scenarioCounts + 1,
            'profile_id' => $validatedScenarioWorkflow['profile_id'],
            'creater_id' => auth()->user()->id
        ]);

        foreach ($validatedScenarioWorkflow['approvers'] as $approver) {
            WorkflowStage::create([
                'scenario_id' => $scenario->id,
                'approver_profile_id' => $approver['id'],
                'teamate' => array_key_exists('teamate', $approver) ? true : false,
            ]);
        }

        return to_route('scenarios.index')->with('success', __('Scenario created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        $scenarios = Scenario::where('profile_id', $profile->id)->get();
        return view('scenarios.show', compact('scenarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scenario $scenario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scenario $scenario)
    {
    }
}
