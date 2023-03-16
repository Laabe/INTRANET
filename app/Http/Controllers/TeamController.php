<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Department;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        $users = User::all();
        return view('teams.index', compact('teams', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $team = new Team();
        $departments = Department::all();
        $projects = Project::all();
        $users = User::all('id', 'first_name', 'last_name');
        return view('teams.create', compact('team', 'users', 'departments', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->validated());
        $teamLeader = User::where('id', $request->team_leader_id)->first();
        $teamLeader->teams()->sync($team);
        return to_route('teams.index')->with('success', __('Team ceated successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $departments = Department::all();
        $projects = Project::all();
        $users = User::all('id', 'first_name', 'last_name');
        return view('teams.edit', compact('team', 'users', 'departments', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->validated());
        return to_route('teams.index')->with('success', __('Team updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->users()->detach();
        $team->delete();
        return to_route('teams.index')->with('success', __('Team deleted successfully'));
    }

    /**
     * Assign a user or multiple users to a team.
     */
    public function AssignUsers(Request $request, Team $team)
    {
        foreach ($request->users_id as $id) {
            $user = User::where('id', $id)->first();
            $user->teams()->sync($team);
        }

        return to_route('teams.index')->with('success', __('The employees are assosicated with the team successfully'));
    }
}
