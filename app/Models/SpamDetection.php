<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SpamDetection extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'attempts',
        'blocked_until',
        'is_verified',
        'user_agent',
        'request_data'
    ];

    protected $casts = [
        'blocked_until' => 'datetime',
        'is_verified' => 'boolean',
        'request_data' => 'array'
    ];

    /**
     * Check if IP is currently blocked
     */
    public static function isBlocked($ipAddress)
    {
        $detection = self::where('ip_address', $ipAddress)->first();

        if (!$detection) {
            return false;
        }

        if ($detection->blocked_until && $detection->blocked_until > now()) {
            return true;
        }

        // Reset if block period expired
        if ($detection->blocked_until && $detection->blocked_until <= now()) {
            $detection->update([
                'blocked_until' => null,
                'attempts' => 0
            ]);
        }

        return false;
    }

    /**
     * Record spam attempt
     */
    public static function recordAttempt($ipAddress, $userAgent = null, $requestData = null)
    {
        $detection = self::firstOrCreate(
            ['ip_address' => $ipAddress],
            [
                'attempts' => 0,
                'user_agent' => $userAgent,
                'request_data' => $requestData
            ]
        );

        $detection->increment('attempts');

        // Block for 30 seconds after 3 failed attempts
        if ($detection->attempts >= 3) {
            $detection->update([
                'blocked_until' => now()->addSeconds(30)
            ]);
        }

        return $detection;
    }

    /**
     * Mark IP as verified (passed captcha)
     */
    public static function markVerified($ipAddress)
    {
        return self::updateOrCreate(
            ['ip_address' => $ipAddress],
            [
                'is_verified' => true,
                'attempts' => 0,
                'blocked_until' => null
            ]
        );
    }

    /**
     * Check if IP is verified
     */
    public static function isVerified($ipAddress)
    {
        $detection = self::where('ip_address', $ipAddress)
                        ->where('is_verified', true)
                        ->first();

        return $detection !== null;
    }
}