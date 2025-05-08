<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function beres()
    {
        $responses = Auth::user()->responses()->with('question.questionnaire')
            ->whereHas('question.questionnaire', fn($q) => $q->where('title','beres'))
            ->pluck('response_value', 'question_id')
            ->toArray();
        return view('dashboard.beres', compact('responses'));
    }

    public function saveBeres(Request $request)
    {
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|string',
        ]);
    
        foreach ($validatedData['responses'] as $response) {
            $request->user()->responses()->updateOrCreate(
                [
                    'user_id' => $request->user()->id,
                    'question_id' => $response['question_id'],
                ],
                [
                    'response_value' => $response['response_value'] ?? null,
                    'submitted_at' => now(),
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

    public function pienakumi()
    {
        return view('dashboard.pienakumi');
    }

    public function savePienakumi(Request $request)
    {
    
    
    return back()->with('status', 'Saglabāts!');
    }
}
