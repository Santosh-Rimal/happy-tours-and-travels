<?php

namespace App\Http\Controllers\Backend;

use App\Models\RecentCsr;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreRecentCsrRequest;
use App\Http\Requests\Backend\UpdateRecentCsrRequest;
use Illuminate\Support\Facades\Storage;

class RecentCsrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $csrs = RecentCsr::latest()->get();
         return view('backend.coroprate.csr.index',compact('csrs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coroprate.csr.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecentCsrRequest $request)
    {
// dd($request->all());
        $input=$request->all();
       if ($request->hasFile('image')) {
       $image = $request->file('image')->store('recent-csrs', 'public');
        $input['image'] = Storage::url($image);
       }

       RecentCsr::create($input);

       return redirect()->route('admin.csrs.index')->with('success', 'CSR added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RecentCsr $csr)
    {
        return view('backend.coroprate.csr.show',compact('csr'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecentCsr $csr)
    {
        return view('backend.coroprate.csr.edit',compact('csr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecentCsrRequest $request, RecentCsr $csr)
    {
    
        $input=$request->all();
        if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($csr->image) {
        Storage::disk('public')->delete($csr->image);
        }
        $image = $request->file('image')->store('recent-csrs', 'public');
         $input['image'] = Storage::url($image);
        }

        $csr->update($input);

        return redirect()->route('admin.csrs.index')->with('success', 'CSR updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecentCsr $csr)
    {
        if ($csr->image) {
        Storage::disk('public')->delete($csr->image);
        }

         $csr->delete();

        return redirect()->route('admin.csrs.index')->with('success', 'CSR deleted successfully!');
    }
}