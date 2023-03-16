<?php

namespace App\Http\Controllers;

use App\Models\RecrutmentPlatforme;
use App\Http\Requests\StoreRecrutmentPlatformeRequest;
use App\Http\Requests\UpdateRecrutmentPlatformeRequest;
use Illuminate\Http\Request;

class RecrutmentPlatformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recrutmentPlatformes = RecrutmentPlatforme::all();
        return view('recrutment-platformes.index', compact('recrutmentPlatformes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recrutmentPlatforme = new RecrutmentPlatforme();
        return view('recrutment-platformes.create', compact('recrutmentPlatforme'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecrutmentPlatformeRequest $request)
    {
        RecrutmentPlatforme::create($request->validated());
        return to_route('recrutment-platformes.index')->with('success', __('Recrutment platforme added successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(RecrutmentPlatforme $recrutmentPlatforme)
    {
        return view('recrutment-platformes.show', compact('recrutmentPlatforme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecrutmentPlatforme $recrutmentPlatforme)
    {
        return view('recrutment-platformes.edit', compact('recrutmentPlatforme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecrutmentPlatforme $recrutmentPlatforme)
    {
        $recrutmentPlatforme->update($request->validate([
            'name' => 'required|string|max:30|unique:recrutment_platformes,name,' . $recrutmentPlatforme->id,
        ]));
        return to_route('recrutment-platformes.index')->with('success', __('Recrutment platforme updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecrutmentPlatforme $recrutmentPlatforme)
    {
        $recrutmentPlatforme->delete();
        return to_route('recrutment-platformes.index')->with('success', __('Recrutment platforme deleted successfully'));
    }
}
