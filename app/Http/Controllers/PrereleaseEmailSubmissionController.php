<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\PrereleaseEmailSubmission;
use App\Mail\PrereleaseEmailSubmitted;

class PrereleaseEmailSubmissionController extends Controller
{
    public function submission(Request $request) {
        // Validate the email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255' // Basic email format validation first (no uniqueness yet)
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Check if the email is already in the database
        if (!PrereleaseEmailSubmission::where('email', $request->email)->exists()) {
            // Only save if it's not already registered
            PrereleaseEmailSubmission::create([
                'email' => $request->email,
            ]);

            Mail::to($request->email)->send(new PrereleaseEmailSubmitted());
        }

        // Redirect with success message
        return response()->json(['success' => true, 'message' => 'Jūsu e-pasts ir reģistrēts!']);;
    }
}
