<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Questionnaire;
use App\Models\Submission;
use App\Models\Response;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function beres()
    {
        $dashboard_title = 'beres';
        $responses = Auth::user()->responses()->with('question.questionnaire')
            ->whereHas('question.questionnaire', fn($q) => $q->where('title', $dashboard_title))
            ->pluck('response_value', 'question_id')
            ->toArray();
        return view("dashboard.$dashboard_title", compact('responses'));
    }

    public function saveBeres(Request $request)
    {
        $dashboard_title = 'beres';
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|string',
        ]);

        // Create a questionnaire submission - for tracking if the user has started it
        Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        );
    
        // Create responses
        foreach ($validatedData['responses'] as $response) {
            Response::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'question_id' => $response['question_id'],
                ],
                [
                    'response_value' => $response['response_value'] ?? null,
                ]
            );
        }
    
        return back()->with('status', 'Saglabāts!');
    }

    public function finanses()
    {
        return view('dashboard.finanses');
    }

    public function savefinanses(Request $request)
    {
    
    
    return back()->with('status', 'Saglabāts!');
    }

    public function med()
    {
        return view('dashboard.med');
    }

    public function saveMed(Request $request)
    {
    
    return back()->with('status', 'Saglabāts!');
    }

    public function pensija()
    {
        return view('dashboard.pensija');
    }

    public function savePensija(Request $request)
    {
    
    
    return back()->with('status', 'Saglabāts!');
    }

    public function zinas()
    {
        return view('dashboard.zinas');
    }

    public function saveZinas(Request $request)
    {
    
    
    return back()->with('status', 'Saglabāts!');
    }

    public function pienakumi()
    {
        return view('dashboard.pienakumi');
    }

    public function savePienakumi(Request $request)
    {
    
    
    return back()->with('status', 'Saglabāts!');
    }
}
