<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.contact.index', compact('messages'));
    }

    public function markRead(ContactMessage $message)
    {
        $message->update(['is_read' => !$message->is_read]);
        return redirect()->route('admin.contact.index')->with('success', 'Status aangepast!');
    }
}