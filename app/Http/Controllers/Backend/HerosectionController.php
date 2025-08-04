<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Herosection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\StoreHeroSectionRequest;
use App\Http\Requests\Backend\UpdateHeroSectionRequest;

class HerosectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $herosections=Herosection::paginate(6);
        return view('backend.herosection.index',compact('herosections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.herosection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeroSectionRequest $request)
    {
        $input=$request->all();
        if ($request->hasFile('heroimage')) {
        $imagePath = $request->file('heroimage')->store('herosectionimage', 'public');
        $input['heroimage']=$imagePath;
        }
        Herosection::create($input);
        return redirect()->route('admin.herosections.index')->with('success', 'Hero Section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Herosection $herosection)
    {
        return view('backend.herosection.show',compact('herosection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Herosection $herosection)
    {
        return view('backend.herosection.edit',compact('herosection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeroSectionRequest $request, Herosection $herosection)
    {
        // dd($herosection);
        $data=$request->all();
        // dd($data);
        if ($request->hasFile('heroimage')) {
        if ($herosection->heroimage && file_exists(storage_path('app/public/' . $herosection->heroimage))) {
@unlink(storage_path('app/public/' . $herosection->heroimage));
            }
            $data['heroimage'] = $request->file('heroimage')->store('herosectionimage', 'public');
            }
            $herosection->update($data);
        return redirect()->route('admin.herosections.index')->with('edit_update', 'Trip updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Herosection $herosection)
    {
         // dd($abouttrip);
         if ($herosection->heroimage) {
         $path = storage_path('app/public/' . $herosection->heroimage);
         if (file_exists($path)) {
@unlink($path);
             }
             }
    
        $herosection->delete();
        return redirect()->route('admin.herosections.index')->with('delete', 'Trip highlight Deleted successfully.');
    }
}