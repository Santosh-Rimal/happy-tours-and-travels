<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreAboutRequest;
use App\Http\Requests\Backend\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutPages = About::get();
        return view('backend.about.index', compact('aboutPages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request)
    {

        $validated = $request->all();

        // Sort sections by order
        usort($validated['sections'], function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });

        $about = About::create([
            'page_title' => $validated['page_title'],
            'page_subtitle' => $validated['page_subtitle'],
            'sections' => $validated['sections'],
        ]);

        return redirect()->route('admin.abouts.index')
            ->with('success', 'About page created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('backend.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('backend.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, About $about)
    {


        $validated = $request->all();

        // Sort sections by order
        usort($validated['sections'], function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });

        $about->update([
            'page_title' => $validated['page_title'],
            'page_subtitle' => $validated['page_subtitle'],
            'sections' => $validated['sections'],
        ]);

        return redirect()->route('admin.abouts.index')
            ->with('success', 'About page updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('admin.abouts.index')
            ->with('success', 'About page deleted successfully!');
    }
}