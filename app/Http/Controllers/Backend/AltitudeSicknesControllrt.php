<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AltitudeSicknes;
use Illuminate\Http\Request;

class AltitudeSicknesControllrt extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $symptoms = AltitudeSicknes::latest()->get();
        return view('backend.travelguide.atitudesickness.symptom.index',compact('symptoms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.travelguide.atitudesickness.symptom.ce');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
        'title' => 'required|string|max:255',
        'mild_symptoms' => 'nullable|array',
        'severe_symptoms' => 'nullable|array',
        ]);

        AltitudeSicknes::create([
        'title' => $request->title,
        'mild_symptoms' => $request->mild_symptoms ?? [],
        'severe_symptoms' => $request->severe_symptoms ?? []
        ]);

        return redirect()->route('admin.altitudesickness.index')->with('success', 'Symptoms created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AltitudeSicknes $altitudesickness)
    {
        return view('backend.travelguide.atitudesickness.symptom.ce',compact('altitudesickness'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AltitudeSicknes $altitudesickness)
    {
        $symptom=$altitudesickness;
        return view('backend.travelguide.atitudesickness.symptom.ce',compact('symptom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AltitudeSicknes $altitudesickness)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'mild_symptoms' => 'nullable|array',
            'severe_symptoms' => 'nullable|array',
        ]);

        $altitudesickness->update([
            'title' => $request->title,
            'mild_symptoms' => $request->mild_symptoms ?? [],
            'severe_symptoms' => $request->severe_symptoms ?? []
        ]);

        return redirect()->route('admin.altitudesickness.index')->with('success', 'Symptoms updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AltitudeSicknes $altitudesickness)
    {
        $altitudesickness->delete();
        return redirect()->route('admin.altitudesickness.index')->with('success', 'Symptoms deleted successfully!');
    }
}