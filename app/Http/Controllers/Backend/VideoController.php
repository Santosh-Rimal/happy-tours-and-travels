<?php

namespace App\Http\Controllers\Backend;

use App\Models\Video;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreVideoRequest;
use App\Http\Requests\Backend\UpdateVideoRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest()->get();
        return view('backend.video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.video.createedit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
       
        $videoData = [
            'title' => $request->title,
            'description' => $request->description,
            'video_path' => $request->video_path,
        ];

        Video::create($videoData);

        return redirect()->route('admin.Videos.index')->with('success', 'Video uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $Video)
    {
        $video=$Video;
        return view('backend.video.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $Video)
    {
        $video=$Video;
        return view('backend.video.createedit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $Video)
    {
        $videoData = [
        'title' => $request->title,
        'description' => $request->description,
        'video_path' => $request->video_path,
        ];

        

        $Video->update($videoData);

        return redirect()->route('admin.Videos.index')->with('success', 'Video updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $Video)
    {

        $Video->delete();

        return redirect()->route('admin.Videos.index')->with('success', 'Video deleted successfully!');
    }
}