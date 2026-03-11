<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contactus.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.\-]+$/'],
            'phone' => 'required|digits:10',
            'email' => 'required|email|min:3|max:255',
            'scheme' => 'required|string',
            'situation' => 'required|string|min:10',
        ]);

        // In a real app, we would save this to a database or send an email.
        // For now, we'll just redirect back with a success message.

        return redirect()->route('contactus.index')->with('success', 'Your request for financial assistance has been submitted successfully. Our team will contact you shortly.');
    }
}
