<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('blog.index');
    }
    public function show($slug) {
        return view("blog.{$slug}");
    }
}
