<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
     public function index(){
        $galleries = Gallery::latest()->get(); 
        return view('frontend.gallery', compact('galleries'));
    }

    // public function show($slug){
    //     // Assuming you have a Blog model to fetch the blog post by slug
    //     $gallery = Blog::where('slug', $slug)->firstOrFail();
    //     return view('frontend.gallery.show', compact('gallery'));
    // }
}