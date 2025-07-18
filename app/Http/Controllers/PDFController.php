<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Platform;
use App\Models\Account;
use App\Models\Device;
use App\Models\DiglegacySubscription;
use App\Models\Questionnaire;
use App\Models\Submission;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $user = Auth::user();
        $fullName = $user->name;
        $messages = Message::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();
        $platforms = Platform::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();
        $devices = Device::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();
        $accounts = Account::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();
        $diglegacysubscriptions = DiglegacySubscription::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();
        $questionnaires = $user->responses()
            ->with('question.questionnaire')
            ->whereHas('question.questionnaire', fn($q) => 
                $q->whereIn('title', ['med', 'pensija', 'beres', 'finanses', 'testaments', 'pienakumi'])
                ->whereHas('submissions', fn($s) => 
                    $s->where('user_id', Auth::id())
                        ->whereNotNull('completed_at')
                ) // add status check for questionnaires to check if they're completed
            )
            ->get()
            ->groupBy('question.questionnaire.title')
            ->map(function ($responses, $title) {
                $data = $responses->mapWithKeys(function ($response) {
                    $decoded = json_decode($response->response_value, true);
                    return [$response->question_id => is_array($decoded) ? $decoded : $response->response_value];
                })->toArray();
                
                // modify the responses to suit specific needs, like ensuring proper formatting for the PDF
                /*
                if ($title === 'finanses' && isset($data[5])) {
                    $data[5] = 'Modified Value';
                }
                */
        
                return $data;
            })
            ->toArray();
        // Separately check for digmantojums and zinas questionnaire completions
        $zinasID = Questionnaire::where('title', 'zinas')->first()->id;
        Submission::where('user_id', Auth::id())->where('questionnaire_id', $zinasID)->first()->completed_at
            ? $questionnaires['zinas'] = 1 : null;
        $digmantojumsID = Questionnaire::where('title', 'digmantojums')->first()->id;
        Submission::where('user_id', Auth::id())->where('questionnaire_id', $digmantojumsID)->first()->completed_at
            ? $questionnaires['digmantojums'] = 1 : null;
    
        $data = [
            'title' => 'Gala Dokuments',

            'pamat_info' => [
                'name' => $fullName,
                'date' => now()->format('Y-m-d'),
                // 'adressees' => $request->input('adressees', 'Nezināms'), #TODO
            ],

            'messages' => $messages,
            'platforms' => $platforms,
            'accounts' => $accounts,
            'devices' => $devices,
            'diglegacysubscriptions' => $diglegacysubscriptions,

            ...$questionnaires,
        ]; 
              
        $pdf = PDF::loadView('pdf.index', $data)->setOptions([
            'defaultFont' => 'DejaVu Sans',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);
       
        return $pdf->stream('itsolutionstuff.pdf');
    }
}
