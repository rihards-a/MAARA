<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Device; // Assuming you will create a Device model

class DeviceController extends Controller
{
    /**
     * Display a listing of the user's devices.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function digmantojums(Request $request)
    {
        // Fetch devices for the authenticated user
        $devices = Device::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();

        // --- Handling for the "Atzīmēt sadaļu kā pabeigtu" checkbox ---
        // You mentioned 'responses[13][response_value]'. This implies a general
        // responses table or a specific mechanism to store this status.
        // Let's assume you have a way to retrieve it.
        $responses = []; // Initialize an empty array
        // Example if you store it in a generic 'user_responses' table
        // $sectionCompletion = UserResponse::where('user_id', Auth::id())
        //                                  ->where('question_id', 13) // Or a specific identifier for this section
        //                                  ->first();
        // if ($sectionCompletion) {
        //     $responses[13]['response_value'] = $sectionCompletion->response_value;
        // }
        // For now, if you don't have this, it will be an empty array,
        // which the blade view can handle with `isset`.
        // -----------------------------------------------------------

        return view("dashboard.digmantojums", compact('devices', 'responses'));
    }

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
            'comments' => 'nullable|string',
        ]);

        Device::create([
            'user_id' => $userId,
            'name' => $validated['name'],
            'importance' => $validated['importance'],
            'access_method' => $validated['access_method'],
            'action_after_death' => $validated['action_after_death'],
            'comments' => $validated['comments'],
        ]);

         return back()->with('status', 'Ierīce saglabāta!')->withFragment('digitalas-ierices');
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
            'comments' => 'nullable|string',
        ]);

        $device->update([
            'name' => $validated['name'],
            'importance' => $validated['importance'],
            'access_method' => $validated['access_method'],
            'action_after_death' => $validated['action_after_death'],
            'comments' => $validated['comments'],
        ]);

        return back()->with('status', 'Ierīce atjaunināta!');
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

        return back()->with('status', 'Ierīce dzēsta!');
    }
}