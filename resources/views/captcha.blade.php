<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .captcha-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }
        .captcha-title {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .captcha-description {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.5;
        }
        .captcha-checkbox {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .captcha-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        .captcha-checkbox label {
            font-size: 16px;
            color: #333;
            cursor: pointer;
        }
        .submit-btn {
            background: #667eea;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .submit-btn:hover {
            background: #5a67d8;
        }
        .submit-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        .error-message {
            color: #e53e3e;
            margin-top: 10px;
            font-size: 14px;
        }
        .shield-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="captcha-container">
        <div class="shield-icon">🛡️</div>
        <h2 class="captcha-title">Security Verification</h2>
        <p class="captcha-description">
            To protect our website from spam and abuse, please verify that you are a human visitor.
        </p>

        <form method="POST" action="{{ route('captcha.verify') }}" id="captchaForm">
            @csrf
            <div class="captcha-checkbox">
                <input type="checkbox" id="captcha_verified" name="captcha_verified" value="1" onchange="toggleSubmit()">
                <label for="captcha_verified">I'm not a robot</label>
            </div>

            <button type="submit" id="submitBtn" class="submit-btn" disabled>
                Continue to Website
            </button>
        </form>

        @if ($errors->has('captcha'))
            <div class="error-message">
                {{ $errors->first('captcha') }}
            </div>
        @endif
    </div>

    <script>
        function toggleSubmit() {
            const checkbox = document.getElementById('captcha_verified');
            const submitBtn = document.getElementById('submitBtn');

            submitBtn.disabled = !checkbox.checked;
        }

        // Auto-submit after checkbox is checked (optional)
        document.getElementById('captcha_verified').addEventListener('change', function() {
            if (this.checked) {
                setTimeout(function() {
                    document.getElementById('captchaForm').submit();
                }, 500);
            }
        });
    </script>
</body>
</html>
