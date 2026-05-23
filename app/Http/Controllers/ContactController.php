<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Opslaan in database
        ContactMessage::create($validated);

        // Email versturen
        Mail::to(config('mail.from.address'))->send(new ContactMail($validated));

        return redirect()->route('contact.create')->with('success', 'Je bericht is verzonden!');
    }
}