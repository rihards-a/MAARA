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
        $googleUser = Socialite::driver('google')->user();
    
        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'password'  => Hash::make(Str::random(32)),
        ]);
        # separately assign the email_verified_at, since it is not in the fillable
        $user->email_verified_at = now();
        $user->save();
    
        Auth::login($user);
    
        return redirect('/dashboard');
    }
}
