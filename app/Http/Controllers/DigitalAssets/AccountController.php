<?php

namespace App\Http\Controllers\DigitalAssets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class AccountController extends Controller
{
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
            'comments' => 'nullable|string|max:10000',
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
            'comments' => 'nullable|string|max:10000',
        ]);

        $account->update([
            'name' => $validated['name'],
            'importance' => $validated['importance'],
            'access_method' => $validated['access_method'],
            'action_after_death' => $validated['action_after_death'],
            'comments' => $validated['comments'],
        ]);

        return back()->with('status', 'Konts atjaunināts!')->withFragment('accounts-section');
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

        return back()->with('status', 'Konts dzēsts!')->withFragment('accounts-section');
    }
}