<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sk\SmartId\Api\Data\AuthenticationHash;

class SmartIDController extends Controller
{
    public function startLogin(Request $request)
    {
        // Optionally validate inputs
        $request->validate([
            'personal-id' => 'required|string',
            'country'     => 'required|string',
        ]);

        $authenticationHash = AuthenticationHash::generate();
        $verificationCode   = $authenticationHash->calculateVerificationCode();

        $nationalIdentityNumber = $request->input("personal-id");
        $country                = $request->input("country");

        // Storing values in session
        session([
            "national-identity-number" => $nationalIdentityNumber,
            "country"                  => $country,
            "auth-hash"                => $authenticationHash,
        ]);

        return view("smartid.login", [
            'controller_name'   => 'LoginController',
            'verification_code' => $verificationCode,
            'personal_id'       => $nationalIdentityNumber,
            'login_error'       => false,
            'country'           => $country,
            'errors'            => false,
        ]);
    }
}
