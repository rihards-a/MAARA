<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('blog.index');
    }
    public function show($slug) {
        $blogTags = config('blog_tags');
        if (array_key_exists($slug, $blogTags))
            return view("blog.{$slug}");
        else
            return redirect()->route('blog.index');
    }

    // implement a tag filtering system
}
