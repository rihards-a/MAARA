<?php

namespace App\Http\Controllers\DigitalAssets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DiglegacySubscription; // Import the new model

class SubscriptionsController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();

        // We expect 'subscriptions' as an array, with nested arrays for categories.
        $validated = $request->validate([
            'subscriptions' => 'nullable|array', // The main 'subscriptions' array can be empty if nothing is selected
            'subscriptions.*' => 'nullable|array', // Each category can be an array or null
            'subscriptions.*.*' => 'string|max:255', // Each service name must be a string
        ]);

        $selectedSubscriptions = $validated['subscriptions'] ?? [];

        // Get all existing subscriptions for the current user from diglegacy_subscriptions table
        $existingSubscriptions = DiglegacySubscription::where('user_id', $userId)->get();

        // --- Step 1: Add new subscriptions ---
        foreach ($selectedSubscriptions as $category => $services) {
            if (is_array($services)) {
                foreach ($services as $serviceName) {
                    // Check if this subscription already exists for the user in the database
                    $exists = $existingSubscriptions->contains(function ($sub) use ($category, $serviceName) {
                        return $sub->category === $category && $sub->service_name === $serviceName;
                    });

                    if (!$exists) {
                        // Create new subscription if it doesn't exist
                        DiglegacySubscription::create([
                            'user_id' => $userId,
                            'category' => $category,
                            'service_name' => $serviceName,
                        ]);
                    }
                }
            }
        }

        // --- Step 2: Remove deselected subscriptions ---
        // Iterate through existing subscriptions and delete if they are no longer selected
        foreach ($existingSubscriptions as $existingSub) {
            $isStillSelected = false;
            // Check if the category itself was submitted (e.g., if all checkboxes for a category were deselected)
            if (isset($selectedSubscriptions[$existingSub->category])) {
                // Check if the specific service name is in the submitted list for its category
                if (is_array($selectedSubscriptions[$existingSub->category])) {
                    $isStillSelected = in_array($existingSub->service_name, $selectedSubscriptions[$existingSub->category]);
                }
            }

            if (!$isStillSelected) {
                $existingSub->delete();
            }
        }

        return back()->with('status', 'Abonementi saglabāti!')->withFragment('digital-subscriptions');
    }
}