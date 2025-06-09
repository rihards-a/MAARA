<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $user = Auth::user();
        $fullName = $user->name;
        [$name, $surname] = explode(' ', $fullName, 2);
        $zinas = Message::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();   
        $questionnaires = $user->responses()
            ->with('question.questionnaire')
            ->whereHas('question.questionnaire', fn($q) => 
                $q->whereIn('title', ['med', 'pensija', 'beres', 'finanses', 'testaments', 'digmantojums', 'pienakumi'])
                // add status check for questionnaires to check if they're completed
            )
            ->get()
            ->groupBy('question.questionnaire.title')
            ->map(fn($responses) => $responses->pluck('response_value', 'question_id')->toArray())
            ->toArray();
    
        $data = [
            'title' => 'Gala Dokuments',

            'pamat_info' => [
                'name' => $name,
                'surname' => $surname,
                'date' => now()->format('Y-m-d'),
                'adressees' => $request->input('adressees', 'Nezināms'), #TODO
            ],

            'zinas' => $zinas,

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
