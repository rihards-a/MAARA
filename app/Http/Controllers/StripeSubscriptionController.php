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
            'metadata' => [
                'user_id' => $request->user()->id,
                'is_lifetime' => true, 
                'subscription_name' => 'LifetimeBasic',
        ],
        ]);
    }

    public function success(Request $request) {
        #dd($request);
        return view('checkout.success');
    }
 
    public function webhook(Request $request) {
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');
        $payload = @file_get_contents('php://input'); # safer to wrap in try catch for logging
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? ''; # if this is not set, should log, because could be a fake attempt
        $event = null;

        try {$event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpoint_secret);} 
        catch (\UnexpectedValueException $e) {return response('', 400);} // Invalid payload, log?
        catch (\Stripe\Exception\SignatureVerificationException $e) {return response('', 400);} // Invalid signature, log?

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object; # this is a StripeEvent object, essentially a session, because of how much data it has
                $metadata = $session->metadata; 
                $user = User::find($metadata->user_id);
                if (!$user) {return response('', 404);} // user not found

                if ($metadata->is_lifetime) {
                    $user->lifetime_subscription = true;
                    $user->save();
                }
                // LOG this event
                break;
            // ... handle other event types
            default:
                # echo 'Received unknown event type ' . $event->type; // echo is not a secure way to log
        }
        return response('');
    }

}
