<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Display a specific questionnaire along with its questions.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Retrieve the questionnaire with its questions
        $questionnaire = Questionnaire::with('questions')->findOrFail($id);

        // Return the view with the questionnaire
        return view('questionnaire', compact('questionnaire'));
    }
}
