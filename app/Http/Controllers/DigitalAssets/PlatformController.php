<?php

namespace App\Http\Controllers\DigitalAssets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Platform;

class PlatformController extends Controller
{
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
            'comments' => 'nullable|string|max:10000',
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
            'comments' => 'nullable|string|max:10000',
        ]);

        $platform->update([
            'name' => $validated['name'],
            'importance' => $validated['importance'],
            'access_method' => $validated['access_method'],
            'action_after_death' => $validated['action_after_death'],
            'comments' => $validated['comments'],
        ]);

        return back()->with('status', 'Platforma atjaunināta!')->withFragment('platforms-section');
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

        return back()->with('status', 'Platforma dzēsta!')->withFragment('platforms-section');
    }
}