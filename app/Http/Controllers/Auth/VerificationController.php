<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpVerificationMail;

class VerificationController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(route('dashboard', absolute: false))
            : view('auth.verify');
    }

    public function verify(Request $request)
    {
        $request->validate(['otp_code' => 'required|numeric|digits:6']);

        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        if ($user->otp_code === $request->otp_code && now()->lessThanOrEqualTo($user->otp_expires_at)) {
            $user->markEmailAsVerified();
            $user->update(['otp_code' => null, 'otp_expires_at' => null]);
            return redirect()->intended(route('dashboard', absolute: false))->with('success', 'Email verified successfully.');
        }

        return back()->withErrors(['otp_code' => 'The valid OTP code is incorrect or expired.']);
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $request->user()->update([
            'otp_code' => (string) random_int(100000, 999999),
            'otp_expires_at' => now()->addMinutes(15)
        ]);

        Mail::to($request->user()->email)->send(new OtpVerificationMail($request->user()->otp_code));

        session(['testing_otp' => $request->user()->otp_code]);

        return back()->with('success', 'A new verification code has been sent to your email.');
    }
}
