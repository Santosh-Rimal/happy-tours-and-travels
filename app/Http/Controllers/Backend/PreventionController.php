<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Prevention;
use Illuminate\Http\Request;

class PreventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $notes = Prevention::latest()->get();
        return view('backend.travelguide.atitudesickness.prevention.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.travelguide.atitudesickness.prevention.ce');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
       'title' => 'required',
       'text' => 'required',
       ]);

       Prevention::create($request->only(['title', 'text']));

       return redirect()->route('admin.preventions.index')->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prevention $prevention)
    {
        $note=$prevention;
        return view('backend.travelguide.atitudesickness.prevention.ce',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prevention $prevention)
    {
        $note=$prevention;
       return view('backend.travelguide.atitudesickness.prevention.ce',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prevention $prevention)
    {
        $request->validate([
        'title' => 'required',
        'text' => 'required',
        ]);

        $prevention->update($request->only(['title', 'text']));

        return redirect()->route('admin.preventions.index')->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prevention $prevention)
    {
        $prevention->delete();
        return redirect()->route('admin.preventions.index')->with('success', 'Note deleted successfully.');
    }
}