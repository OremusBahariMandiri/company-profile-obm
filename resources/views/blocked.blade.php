<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Temporarily Blocked</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .blocked-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        .blocked-title {
            color: #e53e3e;
            margin-bottom: 20px;
            font-size: 28px;
        }
        .blocked-description {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
            font-size: 16px;
        }
        .countdown-timer {
            font-size: 24px;
            color: #e53e3e;
            font-weight: bold;
            margin: 20px 0;
            padding: 15px;
            background: #fed7d7;
            border-radius: 5px;
        }
        .warning-icon {
            font-size: 64px;
            margin-bottom: 20px;
        }
        .retry-btn {
            background: #667eea;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s;
            display: none;
        }
        .retry-btn:hover {
            background: #5a67d8;
        }
        .contact-info {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="blocked-container">
        <div class="warning-icon">⚠️</div>
        <h2 class="blocked-title">Access Temporarily Blocked</h2>
        <p class="blocked-description">
            Your access has been temporarily restricted due to suspicious activity.
            This is a security measure to protect our website from spam and abuse.
        </p>

        <div class="countdown-timer">
            <div>Please wait: <span id="countdown">{{ $remaining_time }}</span> seconds</div>
        </div>

        <p class="blocked-description">
            You will be able to access the website again after the countdown reaches zero.
        </p>

        <button onclick="window.location.reload()" class="retry-btn" id="retryBtn">
            Try Again
        </button>

        <div class="contact-info">
            <p>If you believe this is an error, please contact our support team.</p>
        </div>
    </div>

    <script>
        let remainingTime = {{ $remaining_time }};
        const countdownElement = document.getElementById('countdown');
        const retryBtn = document.getElementById('retryBtn');

        function updateCountdown() {
            countdownElement.textContent = remainingTime;

            if (remainingTime <= 0) {
                retryBtn.style.display = 'inline-block';
                countdownElement.textContent = '0';
                return;
            }

            remainingTime--;
            setTimeout(updateCountdown, 1000);
        }

        updateCountdown();

        // Auto-refresh when countdown reaches 0
        setTimeout(function() {
            window.location.reload();
        }, {{ $remaining_time * 1000 }});
    </script>
</body>
</html>