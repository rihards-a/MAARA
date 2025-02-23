<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index()
    {
        return view('guide.index');
    }
    
    public function registering()
    {
        return view('guide.registering');
    }

    public function available_support()
    {
        return view('guide.available_support');
    }

    public function burial()
    {
        return view('guide.burial');
    }

    public function legacy()
    {
        return view('guide.legacy');
    }

    public function establishments()
    {
        return view('guide.establishments');
    }
}
