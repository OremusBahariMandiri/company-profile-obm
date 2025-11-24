<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Anti-Spam Configuration
    |--------------------------------------------------------------------------
    */

    'enabled' => env('ANTISPAM_ENABLED', true),

    // Rate limiting settings
    'rate_limit' => [
        'max_requests' => env('ANTISPAM_MAX_REQUESTS', 10),
        'time_window' => env('ANTISPAM_TIME_WINDOW', 60), // seconds
    ],

    // Block duration
    'block_duration' => env('ANTISPAM_BLOCK_DURATION', 30), // seconds

    // Captcha settings
    'captcha' => [
        'expire_after' => env('CAPTCHA_EXPIRE_AFTER', 3600), // 1 hour
    ],

    // Suspicious user agents patterns
    'suspicious_patterns' => [
        'bot', 'crawler', 'spider', 'scraper', 'curl', 'wget',
        'python', 'ruby', 'perl', 'automated', 'headless'
    ],

    // Whitelist IPs (admin IPs that bypass anti-spam)
    'whitelist_ips' => [
        '127.0.0.1',
        'localhost',
        // Add your admin IPs here
    ],

    // Minimum time between form submissions (seconds)
    'min_submission_interval' => env('ANTISPAM_MIN_SUBMISSION', 5),
];