<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Mail\ConfirmAccountDeletion;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    /**
     * Send the confirmation email with the secure deletion link.
     */
    public function sendDeletionEmail(Request $request)
    {
        $user = $request->user();

        // Generate a temporary signed URL that expires in, for example, 60 minutes.
        $deletionUrl = URL::temporarySignedRoute(
            'profile.confirm-deletion',
            now()->addMinutes(60),
            ['id' => $user->id, 'email' => $user->email]
        );

        // Send the confirmation email.
        Mail::to($user->email)->send(new ConfirmAccountDeletion($user, $deletionUrl));
        return Redirect::back()->with('status', 'A confirmation email has been sent to your email address.');
    }

    /**
     * Perform the deletion after the user confirms via the signed URL.
     */
    public function confirmDeletion(Request $request)
    {
        if (!$request->hasValidSignature()) { // from temprarySignedRoute
            abort(403, 'Invalid or expired link.');
        }

        $email = URLdecode($request->query('email'));
        $user = User::where('id', $request->query('id'))->where('email', $email)->first();

        if (!$user) {
            abort(404, 'User not found.');
        }

        // Logout the user if necessary
        if (Auth::check() && Auth::user()->id === $user->id) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        $user->delete();

        return Redirect::to('/')->with('status', 'The account has been deleted successfully.');
    }
}
