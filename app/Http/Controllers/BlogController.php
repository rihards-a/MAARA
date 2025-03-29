<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogTag;

class BlogController extends Controller
{
    public function index() {
        // Pass all the blog post objects to the view
        $posts = BlogPost::with('tags')->get();	
        return view('blog.index', compact('posts'));
    }
    
    public function show($slug) {
        // TODO: create a tag system

        // Check whether a view exists for the given slug
        $post = BlogPost::where('slug', $slug)->first();
        if ($post)
            return view("blog.{$slug}");
        else
            return redirect()->route('blog.index');
    }

    // implement a tag filtering system
}
