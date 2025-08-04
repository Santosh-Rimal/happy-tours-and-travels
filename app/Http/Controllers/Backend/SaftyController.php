<?php

namespace App\Http\Controllers\Backend;

use App\Models\Safty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaftyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $safties=Safty::get();
        return view('backend.travelguide.atitudesickness.safty.index',compact('safties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.travelguide.atitudesickness.safty.ce');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
       'title' => 'required|string|max:255',
       'requirements' => 'nullable|array',
       ]);

       Safty::create([
       'title' => $request->title,
       'requirements' => $request->requirements ?? [],
       ]);

       return redirect()->route('admin.safetymeasures.index')->with('success', 'Safety measure created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Safty $safetymeasure)
    {
        $safty=$safetymeasure;
        return view('backend.travelguide.atitudesickness.safty.ce',compact('safty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Safty $safetymeasure)
    {
        $safty=$safetymeasure;
        // dd($safty);
        return view('backend.travelguide.atitudesickness.safty.ce',compact('safty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Safty $safetymeasure)
    {
         $request->validate([
         'title' => 'required|string|max:255',
         'requirements' => 'nullable|array',
         ]);

         $safetymeasure->update([
         'title' => $request->title,
         'requirements' => $request->requirements ?? [],
         ]);

         return redirect()->route('admin.safetymeasures.index')->with('success', 'Safety measure updated
         successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Safty $safetymeasure)
    {
        $safetymeasure->delete();
        return redirect()->route('admin.safetymeasures.index')->with('success', 'Safety measure deleted successfully!');
    }
}