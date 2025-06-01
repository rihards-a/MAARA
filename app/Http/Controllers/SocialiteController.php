<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function google_redirect() {
        return Socialite::driver('google')->redirect();
    }
    
    public function google_callback() {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Google login failed.');
        }
    
        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'password'  => Hash::make(Str::random(32)),
        ]);
        // Update the user's email_verified_at if the email is verified and not already set
        if (!!$user->email_verified_at) { // potentially check for this: $googleUser->user['email_verified'] ?? false)
            $user->email_verified_at = now();
            $user->save();
        }
    
        Auth::login($user);
    
        return redirect()->intended(route('dashboard'));
    }
}
