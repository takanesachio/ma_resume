<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'client__name' => 'required|string|max:255',
            'client_email' => 'required|email|max:255',
            'contact__message' => 'required|string|max:500',
        ]);

        Contact::create([
            'client_name' => $request->input('client__name'),
            'client_email' => $request->input('client_email'),
            'contact_message' => $request->input('contact__message'),
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
