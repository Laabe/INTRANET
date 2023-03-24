<?php

namespace App\Http\Controllers;

use App\Models\AwardBadge;
use App\Http\Requests\StoreAwardBadgeRequest;
use App\Http\Requests\UpdateAwardBadgeRequest;
use Intervention\Image\ImageManagerStatic;

class AwardBadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $awardBadges = AwardBadge::all();
        return view('award-badges.index', compact('awardBadges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $awardBadge = new AwardBadge();
        return view('award-badges.create', compact('awardBadge'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAwardBadgeRequest $request)
    {
        $imageName = $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('award_badges_image'), $imageName);
        // $image = ImageManagerStatic::make(public_path("award_badges_image/{$imageName}"))->resize(1100, 550);
        // $image->save();
        AwardBadge::create(array_merge(
            $request->validated(),
            ['image' => $imageName]
        ));

        return to_route('award-badges.index')->with('success', __('Award badge added successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AwardBadge $awardBadge)
    {
        return view('award-badges.edit', compact('awardBadge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAwardBadgeRequest $request, AwardBadge $awardBadge)
    {
        if ($request->hasFile('image')) {
            // Remove old image from storage
            unlink(public_path("award_badges_image/{$awardBadge->image}"));

            // Rename new image and store it
            $imageName = $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('award_badges_image'), $imageName);
            // $image = ImageManagerStatic::make(public_path("award_badges_image/{$imageName}"))->resize(1100, 550);
            // $image->save();
            $awardBadge->update(array_merge(
                $request->validated(),
                ['image' => $imageName]
            ));
        } else {
            $awardBadge->update($request->validated());
        }

        return to_route('award-badges.index')->with('success', __('Award badge updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AwardBadge $awardBadge)
    {
        // Delete Image from storage if it exists
        unlink(public_path("award_badges_image/{$awardBadge->image}"));
        $awardBadge->delete();
        return to_route('award-badges.index')->with('success', __('Award badge deleted successfully'));
    }
}
