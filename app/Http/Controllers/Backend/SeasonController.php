<?php

namespace App\Http\Controllers\Backend;

use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $peakSeasons = Season::where('category', 'peak_seasons')->get();
       $otherSeasons = Season::where('category', 'other_seasons')->get();

       return view('backend.travelguide.season.index', compact('peakSeasons', 'otherSeasons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.travelguide.season.ce');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'category' => 'required|in:peak_seasons,other_seasons',
            'name' => 'required|string|max:255',
            'months' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        Season::create($validated);

        return redirect()->route('admin.seasons.index')->with('success', 'Season added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Season $season)
    {
        // return view('backend.travelguide.season.ce', compact('season'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Season $season)
    {
        return view('backend.travelguide.season.ce', compact('season'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Season $season)
    {
        $validated = $request->validate([
        'category' => 'required|in:peak_seasons,other_seasons',
        'name' => 'required|string|max:255',
        'months' => 'required|string|max:50',
        'description' => 'required|string',
        'order' => 'integer'
        ]);

        $season->update($validated);

        return redirect()->route('admin.seasons.index')->with('success', 'Season updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $season)
    {
          $season->delete();
          return redirect()->route('admin.seasons.index')->with('success', 'Season deleted successfully!');
    }
}