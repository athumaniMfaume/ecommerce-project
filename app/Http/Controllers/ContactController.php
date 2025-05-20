<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->only('name', 'email', 'phone', 'message'));

        toastr()->timeOut(10000)->closeButton()->addSuccess('Your message have been sent successfully');
        return redirect()->back();
    }

    public function viewMessages()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.message', compact('messages'));
    }

    public function deleteMessage($id)
    {
        $data = ContactMessage::findOrFail($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Message deleted successfully');
        return redirect()->back();
    }
}
