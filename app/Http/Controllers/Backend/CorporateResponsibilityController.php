<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CorporateResponsibility;
use App\Http\Requests\StoreCorporateResponsibilityRequest;
use App\Http\Requests\UpdateCorporateResponsibilityRequest;

class CorporateResponsibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = CorporateResponsibility::latest()->paginate(5);
        return view('backend.coroprate.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coroprate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorporateResponsibilityRequest $request)
    {
       CorporateResponsibility::create($request->all());

       return redirect()->route('admin.corporateresponsibilites.index')
       ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CorporateResponsibility $corporateresponsibilite)
    {
        $item=$corporateresponsibilite;
        return view('backend.coroprate.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CorporateResponsibility $corporateresponsibilite)
    {
        $item=$corporateresponsibilite;
        return view('backend.coroprate.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorporateResponsibilityRequest $request, CorporateResponsibility $corporateresponsibilite)
    {
        $corporateresponsibilite->update($request->all());

        return redirect()->route('admin.corporateresponsibilites.index')
        ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CorporateResponsibility $corporateresponsibilite)
    {
       $corporateresponsibilite->delete();

       return redirect()->route('admin.corporateresponsibilites.index')
       ->with('success', 'Item deleted successfully');
       }
}