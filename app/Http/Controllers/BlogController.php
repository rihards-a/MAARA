<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($special = false){ # for example purposes
        if (!$special) {
            return view('blog.index');
        }
        return view('blog.example_index');
    }

}
