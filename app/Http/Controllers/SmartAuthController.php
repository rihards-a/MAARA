<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SmartAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function smartIdCallback()
    {
        return view('auth.smartid-callback');
    }
}