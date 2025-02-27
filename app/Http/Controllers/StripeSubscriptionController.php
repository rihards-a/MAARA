<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StripeSubscriptionController extends Controller
{
    public function index() {
       return view("checkout.index");
    }
    public function lifetime_checkout(Request $request) {
        $price_id = config('services.stripe.lifetime_price_id');
        return $request->user()->checkout([$price_id => 1], [
            'success_url' => route('subscription.lifetime.success')."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('subscription.lifetime.cancel'),
        ]);
    }

    public function success(Request $request) {
        #dd($request);
        return view('checkout.success');
    }
 
    public function webhook(Request $request) {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

// Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                # TODO: IMPLEMENT ACTUAL LOGIC FOR HOW TO LOG THE NEW SUBSCRIPTION IN TO THE DATABASE
                $user = User::find(2);
                $user->google_id = "thisworks";
                $user->save();
            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }

}
