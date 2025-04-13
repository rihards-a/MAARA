<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrereleaseEmailSubmission;
use Illuminate\Support\Facades\Validator;

class PrereleaseEmailSubmissionController extends Controller
{
    public function submission(Request $request) {
        // Validate the email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:prerelease_email_submissions,email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Store the email in the database
        PrereleaseEmailSubmission::create([
            'email' => $request->email,
        ]);

        // Redirect with success message
        return response()->json(['success' => true, 'message' => 'Jūsu e-pasts ir reģistrēts!']);;
    }
}
