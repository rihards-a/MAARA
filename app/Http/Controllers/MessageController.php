<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class MessageController extends Controller
{
    
    public function zinas(Request $request)
    {   
        $messages = Message::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();    
        
        return view("dashboard.zinas", compact('messages'));
    }

    public function store(Request $request) {
        $userId = Auth::id();
        if (Message::where('user_id', $userId)->count() >= 20) {
            return back()->withErrors(['error' => 'Maksimums ir 20 ziņas.']);
        }

        $validated = $request->validate([
            'addressee' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Message::create([
            'addressee' => $validated['addressee'],
            'content' => $validated['content'],
            'user_id' => $userId,
        ]);

        return back()->with('status', 'Ziņa saglabāta!');
    }

    public function update(Request $request, Message $message)
    {
        if (Auth::id() !== $message->user_id) {
            return back()->withErrors(['error' => 'Tikai ziņas autors var to modificēt.']);
        }

        $validated = $request->validate([
            'addressee' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $message->update([
            'addressee' => $validated['addressee'],
            'content' => $validated['content'],
        ]);

        return back()->with('status', 'Ziņa atjaunināta!');
    }

    public function destroy(Request $request, Message $message) {
        if (Auth::id() !== $message->user_id) {
            return back()->withErrors(['error' => 'Tikai ziņas autors var to modificēt.']);
        }

        $message->delete();

        return back()->with('status', 'Ziņa dzēsta!');
    }
}
