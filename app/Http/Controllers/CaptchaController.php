<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaptchaController extends Controller
{
    public function show()
    {
        return view('captcha');
    }

    public function verify(Request $request)
    {
        // Simple checkbox captcha verification
        if ($request->has('captcha_verified') && $request->captcha_verified == '1') {
            Session::put('captcha_verified', true);
            Session::put('captcha_verified_at', now()->timestamp);

            return redirect()->intended('/');
        }

        return redirect()->route('captcha.show')->withErrors(['captcha' => 'Please verify that you are not a robot.']);
    }

    public function reset()
    {
        Session::forget(['captcha_verified', 'captcha_verified_at']);
        return redirect()->route('captcha.show');
    }
}
