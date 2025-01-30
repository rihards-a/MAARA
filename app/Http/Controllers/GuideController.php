<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function email_input(){
        return view('guide.email_input');
    }

    public function email_processing(Request $request){ // need to add this to a model then database
        $request->validate([
            'email' => 'required|email'
        ]);
        return view('guide.thanks_for_registering');
    }
}
