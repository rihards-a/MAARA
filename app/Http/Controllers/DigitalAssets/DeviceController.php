<?php

namespace App\Http\Controllers\DigitalAssets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;

class DeviceController extends Controller
{
    /**
     * Store a newly created device in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        if (Device::where('user_id', $userId)->count() >= 20) { // Limiting to 20 devices, similar to messages
            return back()->withErrors(['error' => 'Maksimālais ierīču skaits ir 20.']);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'importance' => 'required|string|max:255',
            'access_method' => 'required|string|max:255',
            'action_after_death' => 'required|string|max:255',
            'comments' => 'nullable|string|max:10000', // enough for a small essay
        ]);

        Device::create([
            'user_id' => $userId,
            'name' => $validated['name'],
            'importance' => $validated['importance'],
            'access_method' => $validated['access_method'],
            'action_after_death' => $validated['action_after_death'],
            'comments' => $validated['comments'],
        ]);

         return back()->with('status', 'Ierīce saglabāta!')->withFragment('device-section');
    }

    /**
     * Update the specified device in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Device $device)
    {
        // Ensure only the owner can modify their device
        if (Auth::id() !== $device->user_id) {
            return back()->withErrors(['error' => 'Tikai ierīces autors var to modificēt.']);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'importance' => 'required|string|max:255',
            'access_method' => 'required|string|max:255',
            'action_after_death' => 'required|string|max:255',
            'comments' => 'nullable|string|max:10000', // enough for a small essay
        ]);

        $device->update([
            'name' => $validated['name'],
            'importance' => $validated['importance'],
            'access_method' => $validated['access_method'],
            'action_after_death' => $validated['action_after_death'],
            'comments' => $validated['comments'],
        ]);

        return back()->with('status', 'Ierīce atjaunināta!')->withFragment('device-section');
    }

    /**
     * Remove the specified device from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Device $device)
    {
        // Ensure only the owner can delete their device
        if (Auth::id() !== $device->user_id) {
            return back()->withErrors(['error' => 'Tikai ierīces autors var to dzēst.']);
        }

        $device->delete();

        return back()->with('status', 'Ierīce dzēsta!')->withFragment('device-section');
    }
}