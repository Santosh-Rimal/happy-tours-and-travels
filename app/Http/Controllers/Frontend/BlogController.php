<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::latest()->get(); 
        return view('frontend.blogs', compact('blogs'));
    }

    public function show($slug){
        // Assuming you have a Blog model to fetch the blog post by slug
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('frontend.blog-single', compact('blog'));
    }
}