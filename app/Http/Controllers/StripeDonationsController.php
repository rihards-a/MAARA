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
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $stripeKey=config('stripe.sk');
        if (empty($stripeKey)) {
            abort(520, 'Stripe API key is missing.');
        }
        
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Donation',
                    ],
                    'unit_amount' => $request->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('donate.success'),
            'cancel_url' => route('donate.index'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('donate_success');
    }
}
