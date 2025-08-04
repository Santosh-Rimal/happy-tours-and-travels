<?php

namespace App\Http\Controllers\Backend;

use App\Models\CulturalDo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CulturalDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $culturals = CulturalDo::latest()->get();
        return view('backend.travelguide.culturaldo.index',compact('culturals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.travelguide.culturaldo.ce');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'what_do' => 'nullable|string',
        ]);

        CulturalDo::create($request->only(['title', 'what_do']));

        return redirect()->route('admin.culturaldoes.index')->with('success', 'Cultural Do created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CulturalDo $culturaldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CulturalDo $culturaldo)
    {
       $cultural = $culturaldo;
       return view('backend.travelguide.culturaldo.ce', compact('cultural'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CulturalDo $culturaldo)
    {
         $request->validate([
         'title' => 'required|string|max:255',
         'what_do' => 'nullable|string',
         ]);

         $culturaldo->update($request->only(['title', 'what_do']));

         return redirect()->route('admin.culturaldoes.index')->with('success', 'Cultural Do updated
         successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CulturalDo $culturaldo)
    {
        $culturaldo->delete();
        return redirect()->route('admin.culturaldoes.index')->with('success', 'Cultural Do deleted successfully.');
    }
}