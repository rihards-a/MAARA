<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Platform; // Make sure you create a Platform model

class PlatformController extends Controller
{
    /**
     * Display a listing of the user's platforms.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Fetch platforms for the authenticated user
        $platforms = Platform::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();

        // This section is preserved as per your original logic
        $responses = [];

        return view("dashboard.platforms", compact('platforms', 'responses'));
    }

    /**
     * Store a newly created platform in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        if (Platform::where('user_id', $userId)->count() >= 20) { // Limiting to 20 platforms
            return back()->withErrors(['error' => 'Maksimālais platformu skaits ir 20.']);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'importance' => 'required|string|max:255',
            'access_method' => 'required|string|max:255',
            'action_after_death' => 'required|string|max:255',
            'comments' => 'nullable|string',
        ]);

        Platform::create([
            'user_id' => $userId,
            'name' => $validated['name'],
            'importance' => $validated['importance'],
            'access_method' => $validated['access_method'],
            'action_after_death' => $validated['action_after_death'],
            'comments' => $validated['comments'],
        ]);

        return back()->with('status', 'Platforma saglabāta!')->withFragment('platforms-section');
    }

    /**
     * Update the specified platform in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Platform $platform)
    {
        // Ensure only the owner can modify their platform
        if (Auth::id() !== $platform->user_id) {
            return back()->withErrors(['error' => 'Tikai platformas autors var to modificēt.']);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'importance' => 'required|string|max:255',
            'access_method' => 'required|string|max:255',
            'action_after_death' => 'required|string|max:255',
            'comments' => 'nullable|string',
        ]);

        $platform->update([
            'name' => $validated['name'],
            'importance' => $validated['importance'],
            'access_method' => $validated['access_method'],
            'action_after_death' => $validated['action_after_death'],
            'comments' => $validated['comments'],
        ]);

        return back()->with('status', 'Platforma atjaunināta!');
    }

    /**
     * Remove the specified platform from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Platform $platform)
    {
        // Ensure only the owner can delete their platform
        if (Auth::id() !== $platform->user_id) {
            return back()->withErrors(['error' => 'Tikai platformas autors var to dzēst.']);
        }

        $platform->delete();

        return back()->with('status', 'Platforma dzēsta!');
    }
}