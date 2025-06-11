<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account; // Make sure you create an Account model

class AccountController extends Controller
{
    /**
     * Display a listing of the user's accounts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Fetch accounts for the authenticated user
        $accounts = Account::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();

        // This section is preserved as per your original logic
        $responses = [];

        // It's better to use a more specific view name if possible,
        // but 'dashboard.accounts' is fine.
        return view("dashboard.accounts", compact('accounts', 'responses'));
    }

    /**
     * Store a newly created account in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        if (Account::where('user_id', $userId)->count() >= 20) { // Limiting to 20 accounts
            return back()->withErrors(['error' => 'Maksimālais kontu skaits ir 20.']);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'importance' => 'required|string|max:255',
            'access_method' => 'required|string|max:255',
            'action_after_death' => 'required|string|max:255',
            'comments' => 'nullable|string',
        ]);

        Account::create([
            'user_id' => $userId,
            'name' => $validated['name'],
            'importance' => $validated['importance'],
            'access_method' => $validated['access_method'],
            'action_after_death' => $validated['action_after_death'],
            'comments' => $validated['comments'],
        ]);

        return back()->with('status', 'Konts saglabāts!')->withFragment('accounts-section');
    }

    /**
     * Update the specified account in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Account $account)
    {
        // Ensure only the owner can modify their account
        if (Auth::id() !== $account->user_id) {
            return back()->withErrors(['error' => 'Tikai konta autors var to modificēt.']);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'importance' => 'required|string|max:255',
            'access_method' => 'required|string|max:255',
            'action_after_death' => 'required|string|max:255',
            'comments' => 'nullable|string',
        ]);

        // --- THIS IS THE CORRECTED PART ---
        // Use the existing $account object to update its properties
        $account->update([
            'name' => $validated['name'],
            'importance' => $validated['importance'],
            'access_method' => $validated['access_method'],
            'action_after_death' => $validated['action_after_death'],
            'comments' => $validated['comments'],
        ]);
        // ------------------------------------

        return back()->with('status', 'Konts atjaunināts!');
    }

    /**
     * Remove the specified account from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Account $account)
    {
        // Ensure only the owner can delete their account
        if (Auth::id() !== $account->user_id) {
            return back()->withErrors(['error' => 'Tikai konta autors var to dzēst.']);
        }

        $account->delete();

        return back()->with('status', 'Konts dzēsts!');
    }
}