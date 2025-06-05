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
        )->touch(); // for updating the timestamp
    
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
        $dashboard_title = 'finanses';
        $responses = Auth::user()->responses()->with('question.questionnaire')
            ->whereHas('question.questionnaire', fn($q) => $q->where('title', $dashboard_title))
            ->get(['question_id', 'response_value'])
            ->mapWithKeys(function ($response) {
                $value = $response->response_value;
                $decoded = is_string($value) ? json_decode($value, true) : $value;
                return [$response->question_id => $decoded];
            })
            ->toArray();
        return view("dashboard.$dashboard_title", compact('responses'));
    }

    public function savefinanses(Request $request)
    {
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id'       => 'required|exists:questions,id',
            'responses.*.response_value'    => 'nullable|array|max:7', // multichoice question with up to 7 options
            'responses.100.response_value.*' => 'nullable|string|in:paypal,revolut,other,none', 
            'responses.101.response_value.*' => 'nullable|string|in:swedbank,seb,luminor,citadele,indexo,otherLV,otherForeign', 
            'responses.102.response_value.*' => 'nullable|string|in:yes,no,options', 
            'responses.103.response_value.*' => 'nullable|string|in:yes,no',
            'responses.104.response_value.*' => 'nullable|string|in:0,1,2,3,4,5,6,7,8,9,10,10+', // array[0] for lv [1] for foreign
            'responses.105.response_value.*' => 'nullable|string|in:0,1,2,3,4,5,6,7,8,9,10,10+', // array[0] for lv [1] for foreign
        ]);
        $dashboard_title = 'finanses';

        // Create a questionnaire submission - for tracking if the user has started it
        Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        )->touch(); // for updating the timestamp

        // Create responses
        foreach ($validatedData['responses'] as $response) {
            $value = $response['response_value'] ?? null;
            $responseValue = json_encode($value);
            Response::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'question_id' => $response['question_id'],
                ],
                [
                    'response_value' => $responseValue,
                ]
            );
        }
    
        return back()->with('status', 'Saglabāts!');
    }

    public function med()
    {
        {
            $dashboard_title = 'med';
            $responses = Auth::user()->responses()->with('question.questionnaire')
                ->whereHas('question.questionnaire', fn($q) => $q->where('title', $dashboard_title))
                ->pluck('response_value', 'question_id')
                ->toArray();
            return view("dashboard.$dashboard_title", compact('responses'));
        }
    }

    public function saveMed(Request $request)
    {
        $dashboard_title = 'med';
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|boolean', // should only be checkable
        ]);

        // Create a questionnaire submission - for tracking if the user has started it
        Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        )->touch(); // for updating the timestamp
    
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

    public function pensija()
    {
        $dashboard_title = 'pensija';
        $responses = Auth::user()->responses()->with('question.questionnaire')
            ->whereHas('question.questionnaire', fn($q) => $q->where('title', $dashboard_title))
            ->pluck('response_value', 'question_id')
            ->toArray();
        return view("dashboard.$dashboard_title", compact('responses'));
    }

    public function savePensija(Request $request)
    {
        $dashboard_title = 'med';
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|boolean', // should only be checkable
        ]);

        // Create a questionnaire submission - for tracking if the user has started it
        Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        )->touch(); // for updating the timestamp
    
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

    public function pienakumi()
    {
        $dashboard_title = 'pienakumi';
        $responses = Auth::user()->responses()->with('question.questionnaire')
            ->whereHas('question.questionnaire', fn($q) => $q->where('title', $dashboard_title))
            ->pluck('response_value', 'question_id')
            ->toArray();
        return view("dashboard.$dashboard_title", compact('responses'));
    }

    public function savePienakumi(Request $request)
    {
        $dashboard_title = 'pienakumi';
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
        )->touch(); // for updating the timestamp
    
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
    public function testaments()
    {
        $dashboard_title = 'testaments';
        $responses = Auth::user()->responses()->with('question.questionnaire')
            ->whereHas('question.questionnaire', fn($q) => $q->where('title', $dashboard_title))
            ->pluck('response_value', 'question_id')
            ->toArray();
        return view("dashboard.$dashboard_title", compact('responses'));
    }

    public function saveTestaments(Request $request)
    {
        $dashboard_title = 'testaments';
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|boolean',
        ]);
        
        // Create a questionnaire submission - for tracking if the user has started it
        Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        )->touch(); // for updating the timestamp
    
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
}
