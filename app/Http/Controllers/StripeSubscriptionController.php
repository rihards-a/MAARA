<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

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
        return view('checkout.success');
    }
 
    public function webhook(Request $request) {
        $endpoint_secret = config('services.stripe.webhook.secret');
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        # plain php way:
        #   $payload = @file_get_contents('php://input'); # safer to wrap in try catch for logging
        #   $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? ''; # if this is not set, should log, because could be a fake attempt
        $event = null;

        try {
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (\UnexpectedValueException $e) {
            Log::error('Invalid payload for Stripe webhook: ' . $e->getMessage());
            return response()->noContent(400);
        } catch (SignatureVerificationException $e) {
            Log::error('Stripe webhook signature verification failed: ' . $e->getMessage());
            return response()->noContent(400);
        }

        // Handle the event
        if ($event->type === 'checkout.session.completed') {
                $session = $event->data->object; # this is a StripeEvent object, essentially a session, because of how much data it has
                $metadata = $session->metadata; 
                $user = User::find($metadata->user_id);
                if (!$user) {
                    Log::warning("User not found for Stripe webhook event, user_id: {$metadata->user_id}");
                    return response()->noContent(404);
                }
                if ($metadata->is_lifetime) {
                    $user->lifetime_subscription = true;
                    $user->save();
                }
                Log::info("Processed lifetime subscription for user_id: {$user->id}");
        }
        return response()->noContent();
    }

}
