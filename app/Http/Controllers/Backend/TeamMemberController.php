<?php

namespace App\Http\Controllers\Backend;

use App\Models\TeamMember;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\StoreTeamMemberRequest;
use App\Http\Requests\Backend\UpdateTeamMemberRequest;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $teamMembers = TeamMember::orderBy('order')->get();
        return view('backend.team.index',compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamMemberRequest $request)
    {
         $validated = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('teams', 'public');
        $validated['image_url'] = Storage::url($imagePath);
        }

        TeamMember::create($validated);

        return redirect()->route('admin.teams.index')
        ->with('success', 'Team member created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMember $team)
    {
        return view('backend.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMember $team)
    {
        return view('backend.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamMemberRequest $request, TeamMember $team)
    {
        $validated = $request->all();

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($team->image_url) {
        $oldImage = str_replace('/storage', '', $team->image_url);
        Storage::disk('public')->delete($oldImage);
        }

        $imagePath = $request->file('image')->store('teams', 'public');
        $validated['image_url'] = Storage::url($imagePath);
        }

        $team->update($validated);

        return redirect()->route('admin.teams.index')
        ->with('success', 'Team member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $team)
    {
         // Delete associated image
         if ($team->image_url) {
         $oldImage = str_replace('/storage', '', $team->image_url);
         Storage::disk('public')->delete($oldImage);
         }

         $team->delete();

         return redirect()->route('admin.teams.index')
         ->with('success', 'Team member deleted successfully!');
    }
}