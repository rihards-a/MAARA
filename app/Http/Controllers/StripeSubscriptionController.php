<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Stripe\Webhook;
use Stripe\Stripe;
use Stripe\Checkout\Session;
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
            'cancel_url' => route('dashboard'),
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
        # TODO: Implement PendingPurchase: create record before Checkout, write pending_id into session.metadata,
        # verify pending_id + price + payment server-side in webhook, mark pending.completed.
        $price_id = config('services.stripe.lifetime_price_id');
        $endpoint_secret = config('services.stripe.webhook.secret');
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');

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
            $sessionId = $event->data->object->id;
            Stripe::setApiKey(config('services.stripe.secret')); // Ensure the API key is set
            
            try {
                $session = Session::retrieve($sessionId);
            } catch (\Exception $e) {
                Log::error("Failed to retrieve session $sessionId: ".$e->getMessage());
                return response()->noContent(500);
            }
            
            # $session = $event->data->object; // Use the object directly from the event - testing

            $metadata = $session->metadata; 
            $user = User::find($metadata->user_id);

            if (!$user) {
                Log::warning("User not found for Stripe webhook event for session: {$session->id}");
                return response()->noContent(404);
            }
            if ($session->payment_status !== 'paid') {
                Log::warning("Unpaid session {$session->id} for user_id: {$user->id}");
                return response()->noContent(400);
            }
            $lineItems = Session::allLineItems($sessionId);
            $priceIds = collect($lineItems->data)->pluck('price.id')->unique()->toArray();
            if (! in_array($price_id, $priceIds, true)) {
                Log::warning("Price mismatch on session $sessionId");
                return response()->noContent(400);
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
