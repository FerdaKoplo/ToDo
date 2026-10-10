<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailOTPController extends Controller
{
    public function index()
    {
        return Inertia::render('auth/login');
    }

    public function otpRequest(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
        $user = User::where('email', $request->email)->firstOrFail();

        $user->sendOneTimePassword();
        session(['login_email' => $request->email]);

        return back()->with('success', 'If this email is registered, an OTP has been sent.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        if (! $user) {
            return back()->withErrors(['otp' => 'Invalid email or OTP.']);
        }

        $result = $user->attemptLoginUsingOneTimePassword($request->otp);

        if ($result->isOk()) {
            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'otp' => 'The provided OTP is invalid or has expired.',
        ]);
    }

    public function resendOTP()
    {
        $email = session('login_email');

        if (! $email) {
            return back()->withErrors(['email' => 'Session expired. Please request a new OTP.']);
        }

        $user = User::where('email', $email)->firstOrFail();
        $user->sendOneTimePassword();

        return back()->with('success', 'A new OTP has been sent.');
    }
}
