<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AntiSpamMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $key = 'spam_check_' . md5($ip . $userAgent);

        // Check if user is blocked
        if (Cache::has('blocked_' . $ip)) {
            $blockedUntil = Cache::get('blocked_' . $ip);
            $remainingTime = $blockedUntil - now()->timestamp;

            if ($remainingTime > 0) {
                return response()->view('blocked', [
                    'remaining_time' => $remainingTime
                ], 429);
            } else {
                Cache::forget('blocked_' . $ip);
            }
        }

        // Check if captcha verification needed
        if (!Session::has('captcha_verified') || Session::get('captcha_verified') !== true) {
            // Allow admin routes without captcha
            if ($request->is('admin*') || $request->is('login') || $request->is('register')) {
                return $next($request);
            }

            return redirect()->route('captcha.show');
        }

        // Spam detection logic
        $this->detectSpam($request, $ip);

        return $next($request);
    }

    private function detectSpam($request, $ip)
    {
        // Rate limiting - max 10 requests per minute
        $rateLimitKey = 'rate_limit_' . $ip;
        $requests = Cache::get($rateLimitKey, 0);

        if ($requests >= 10) {
            $this->blockUser($ip);
            return;
        }

        Cache::put($rateLimitKey, $requests + 1, now()->addMinute());

        // Detect suspicious patterns
        $userAgent = $request->userAgent();
        $suspiciousPatterns = [
            'bot', 'crawler', 'spider', 'scraper', 'curl', 'wget',
            'python', 'ruby', 'perl', 'automated'
        ];

        foreach ($suspiciousPatterns as $pattern) {
            if (stripos($userAgent, $pattern) !== false) {
                $this->blockUser($ip);
                return;
            }
        }

        // Check for rapid form submissions
        if ($request->isMethod('post')) {
            $lastSubmission = Session::get('last_submission_time', 0);
            $currentTime = now()->timestamp;

            if ($currentTime - $lastSubmission < 5) { // Less than 5 seconds
                $this->blockUser($ip);
                return;
            }

            Session::put('last_submission_time', $currentTime);
        }
    }

    private function blockUser($ip)
    {
        // Block for 30 seconds
        $blockUntil = now()->addSeconds(30)->timestamp;
        Cache::put('blocked_' . $ip, $blockUntil, now()->addSeconds(30));

        // Log the spam attempt
        \Log::warning('Spam detected from IP: ' . $ip);
    }
}
