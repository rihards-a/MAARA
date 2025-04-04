<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    /**
     * Store the submission and responses.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'questionnaire_id' => 'required|exists:questionnaires,id',
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
        ]);

        // Create a new submission record
        // (Assuming the user is authenticated; adjust as needed)
        $submission = Submission::create([
            'user_id'          => Auth::user()->id,
            'questionnaire_id' => $request->questionnaire_id,
            'status'           => 'completed', // You may adjust the status as needed
            'started_at'       => now(),
            'completed_at'     => now(),
        ]);

        // Save each response related to the submission
        foreach ($request->responses as $data) {
            Response::create([
                'user_id'       => Auth::user()->id,
                'question_id'   => $data['question_id'],
                'response_text' => $data['response_text'] ?? null,
                'response_value'=> $data['response_value'] ?? null,
                'submitted_at'  => now(),
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your responses have been submitted successfully.');
    }
}
