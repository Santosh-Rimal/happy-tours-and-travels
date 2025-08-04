<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\CulturalDoNot;
use App\Http\Controllers\Controller;

class CulturalDoNotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $culturalDoNots = CulturalDoNot::get();
        return view('backend.travelguide.culturaldonot.index',compact('culturalDoNots'));
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
        'title' => 'required|string',
        'what_donot' => 'required|string',
        ]);

        CulturalDoNot::create($request->only('title', 'what_donot'));

        return redirect()->route('admin.culturaldoesnots.index')->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CulturalDoNot $culturaldoesnot)
    {
        // $culturalDoNot=$culturaldoesnot;
        //  return view('backend.travelguide.culturaldonot.show',compact('culturalDoNot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CulturalDoNot $culturaldoesnot)
    {
          $culturalDoNot=$culturaldoesnot;
          return view('backend.travelguide.culturaldonot.ce',compact('culturalDoNot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CulturalDoNot $culturaldoesnot)
    {
       $request->validate([
       'title' => 'required|string',
       'what_donot' => 'required|string',
       ]);

       $culturaldoesnot->update($request->only('title', 'what_donot'));

       return redirect()->route('admin.culturaldoesnots.index')->with('success', 'Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CulturalDoNot $culturaldoesnot)
    {
       $culturaldoesnot->delete();
       return redirect()->route('culturaldoesnots.index')->with('success', 'Deleted successfully.');
    }
}