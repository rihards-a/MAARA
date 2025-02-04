<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeDonationsController extends Controller
{
    public function index()
    {
        return view('donate');
    }

    public function checkout(Request $request)
    {
        return redirect("https://donate.stripe.com/test_00gfZXdsT72k2Q0bII");
    }
}
