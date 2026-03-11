<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpVerificationMail;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('register');
    }

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.\-]+$/'],
            'email' => 'required|email|min:3|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => 'required|digits:10',
            'address' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'blood_group' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'patient',
            'otp_code' => (string) random_int(100000, 999999),
            'otp_expires_at' => now()->addMinutes(15)
        ]);

        Mail::to($user->email)->send(new OtpVerificationMail($user->otp_code));

        session(['testing_otp' => $user->otp_code]);

        Patient::create([
            'user_id' => $user->id,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'blood_group' => $request->blood_group,
            'address' => $request->address
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

}