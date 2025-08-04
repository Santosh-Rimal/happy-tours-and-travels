<?php

namespace App\Http\Controllers\Backend;

use App\Models\Visa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visaInfos = Visa::latest()->get();
        return view('backend.travelguide.visainfo.index', compact('visaInfos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.travelguide.visainfo.ce');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
         'title' => 'required|string|max:255',
         'description' => 'required|string',
         'requirements' => 'required|array',
         'requirements.*' => 'required|string'
         ]);

         Visa::create($validated);

         return redirect()->route('admin.visas.index')
         ->with('success', 'Visa information created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visa $visa)
    {
        $visaInfo=$visa;
        return view('backend.travelguide.visainfo.ce',compact('visaInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visa $visa)
    {
         $visaInfo=$visa;
        return view('backend.travelguide.visainfo.ce',compact('visaInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visa $visa)
    {
       $validated = $request->validate([
       'title' => 'required|string|max:255',
       'description' => 'required|string',
       'requirements' => 'required|array',
       'requirements.*' => 'required|string'
       ]);

       $visa->update($validated);

       return redirect()->route('admin.visas.index')
       ->with('success', 'Visa information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visa $visa)
    {
        $visa->delete();
        return redirect()->route('admin.visas.index')
        ->with('success', 'Visa information deleted successfully!');
    }
}