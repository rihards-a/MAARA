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
    
        Auth::login($user);
    
        return redirect('/dashboard');
    }
}
