<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeDonationsController extends Controller
{
    public function index()
    {
        return view('donate');
    }

    public function charge(Request $request)
    {
        $amount = $request->amount;
        $amount = $amount * 100;
        $amount = (int) $amount;

        #\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }
}
