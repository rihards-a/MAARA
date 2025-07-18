<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Questionnaire;
use App\Models\Submission;
use App\Models\Response;
use App\Models\Device; 
use App\Models\Account;
use App\Models\Platform;
use App\Models\DiglegacySubscription;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the authenticated user's ID
        $userId = Auth::id(); // <--- These lines are new
        $latestSubmission = Submission::where('user_id', $userId) // <---
                                      ->latest('updated_at')      // <---
                                      ->first();                 // <---
        $completed_questionnaire_count = Submission::where('user_id', $userId)
            ->whereNotNull('completed_at')
            ->count();
        // sakt, turpinat, labot
        $questionnaire_progress = []; 
        foreach (Questionnaire::all() as $questionnaire) {
            $submission = Submission::where('user_id', $userId)
                ->where('questionnaire_id', $questionnaire->id)
                ->first();
            if ($submission) {
                $submission->updated_at ? $questionnaire_progress[$questionnaire->title] = 'Turpināt' : null;
                $submission->completed_at ? $questionnaire_progress[$questionnaire->title] = 'Labot' : null;
            } else {
                $questionnaire_progress[$questionnaire->title] = 'Sākt';
            }
        }
        return view('dashboard.index', compact('latestSubmission','completed_questionnaire_count', 'questionnaire_progress')); 
    }

    public function beres()
    {
        $dashboard_title = 'beres';
        $responses = Auth::user()->responses()->with('question.questionnaire')
            ->whereHas('question.questionnaire', fn($q) => $q->where('title', $dashboard_title))
            ->pluck('response_value', 'question_id')
            ->toArray();
        $submission = Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        )->completed_at ? 1 : 0; // Check if the submission is completed
        return view("dashboard.$dashboard_title", compact('responses','submission'));
    }

    public function saveBeres(Request $request)
    {
        $dashboard_title = 'beres';
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|string',
            'submission' => 'nullable|boolean',
        ]);
        
        // Create a questionnaire submission - for tracking if the user has started it
        $s = Submission::where([
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
        ])->first();
        $s->touch(); // for updating the timestamp
        $s->completed_at = !empty($validatedData['submission']) ? now() : null; // mark as completed if submission is true
        $s->save();
    
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
        $submission = Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        )->completed_at ? 1 : 0; // Check if the submission is completed
        return view("dashboard.$dashboard_title", compact('responses','submission'));
    }

    public function savefinanses(Request $request)
    {
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id'       => 'required|exists:questions,id',
            'responses.*.response_value'    => 'nullable|array|max:7',
            'responses.100.response_value.*' => 'nullable|string|in:paypal,revolut,other,none',
            'responses.101.response_value.*' => 'nullable|string|in:swedbank,seb,luminor,citadele,indexo,otherLV,otherForeign',
            'responses.102.response_value.*' => 'nullable|string|in:yes,no,options',
            'responses.103.response_value.*' => 'nullable|string|in:true,false,1,0,yes,no',
            'responses.104.response_value.*' => 'nullable|string|in:0,1,2,3,4,5,6,7,8,9,10,10+',
            'responses.105.response_value.*' => 'nullable|string|in:0,1,2,3,4,5,6,7,8,9,10,10+',
            'responses.106.response_value.*' => 'nullable|string|in:0,1,2,3,4,5,6,7,8,9,10,10+',
            'responses.107.response_value.*' => 'nullable|string|in:true,false,1,0,yes,no',
            'responses.108.response_value.*' => 'nullable|string|in:true,false,1,0,yes,no',
            'submission' => 'nullable|boolean',
        ]);
        $dashboard_title = 'finanses';

        $s = Submission::where([
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
        ])->first();
        $s->touch(); // for updating the timestamp
        $s->completed_at = !empty($validatedData['submission']) ? now() : null; // mark as completed if submission is true
        $s->save();

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
            $submission = Submission::firstOrCreate(
                [
                    'user_id'          => Auth::id(),
                    'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
                ],
            )->completed_at ? 1 : 0; // Check if the submission is completed
            return view("dashboard.$dashboard_title", compact('responses','submission'));
        }
    }

    public function saveMed(Request $request)
    {
        $dashboard_title = 'med';
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|boolean', // should only be checkable
            'submission' => 'nullable|boolean',
        ]);

        $s = Submission::where([
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
        ])->first();
        $s->touch(); // for updating the timestamp
        $s->completed_at = !empty($validatedData['submission']) ? now() : null; // mark as completed if submission is true
        $s->save();
    
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
        $submission = Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        )->completed_at ? 1 : 0; // Check if the submission is completed
        return view("dashboard.$dashboard_title", compact('responses','submission'));
    }

    public function savePensija(Request $request)
    {
        $dashboard_title = 'pensija';
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|boolean', // should only be checkable
            'submission' => 'nullable|boolean',
        ]);

        $s = Submission::where([
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
        ])->first();
        $s->touch(); // for updating the timestamp
        $s->completed_at = !empty($validatedData['submission']) ? now() : null; // mark as completed if submission is true
        $s->save();
        
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
        $submission = Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        )->completed_at ? 1 : 0; // Check if the submission is completed
        return view("dashboard.$dashboard_title", compact('responses','submission'));
    }

    public function savePienakumi(Request $request)
    {
        $dashboard_title = 'pienakumi';
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|string',
            'submission' => 'nullable|boolean',
        ]);

        $s = Submission::where([
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
        ])->first();
        $s->touch(); // for updating the timestamp
        $s->completed_at = !empty($validatedData['submission']) ? now() : null; // mark as completed if submission is true
        $s->save();
        
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
        $submission = Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        )->completed_at ? 1 : 0; // Check if the submission is completed
        return view("dashboard.$dashboard_title", compact('responses','submission'));
    }

    public function saveTestaments(Request $request)
    {
        $dashboard_title = 'testaments';
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|boolean',
            'submission' => 'nullable|boolean',
        ]);
        
        $s = Submission::where([
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
        ])->first();
        $s->touch(); // for updating the timestamp
        $s->completed_at = !empty($validatedData['submission']) ? now() : null; // mark as completed if submission is true
        $s->save();
    
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
     public function digmantojums()
    {
        $dashboard_title = 'digmantojums';
        $responses = Auth::user()->responses()->with('question.questionnaire')
            ->whereHas('question.questionnaire', fn($q) => $q->where('title', $dashboard_title))
            ->pluck('response_value', 'question_id')
            ->toArray();

        // Fetch devices for the authenticated user
        $devices = Device::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();
        
        $accounts = Account::where('user_id', Auth::id())
        ->orderBy('created_at') 
        ->get();

        $platforms = Platform::where('user_id', Auth::id())
        ->orderBy('created_at')
        ->get(); 

        $subscriptions = DiglegacySubscription::where('user_id', Auth::id())
        ->get()
        ->groupBy('category')
        ->map(fn($items) => $items->pluck('service_name')->toArray());
       
        $submission = Submission::firstOrCreate(
            [
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
            ],
        )->completed_at ? 1 : 0; // Check if the submission is completed

        return view("dashboard.$dashboard_title", compact('responses', 'devices', 'accounts', 'platforms', 'subscriptions', 'submission')); 
    }

    public function saveDigmantojums(Request $request)
    {
        $dashboard_title = 'digmantojums';
        $validatedData = $request->validate([
            /* other models are being saved in their own controllers
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'nullable|string',
            */
            'submission' => 'nullable|boolean',
        ]);

        $s = Submission::where([
                'user_id'          => Auth::id(),
                'questionnaire_id' => Questionnaire::where('title', $dashboard_title)->firstOrFail()->id,
        ])->first();
        $s->touch(); // for updating the timestamp
        $s->completed_at = !empty($validatedData['submission']) ? now() : null; // mark as completed if submission is true
        $s->save();

        return back()->with('status', 'Saglabāts!');
    }

}
