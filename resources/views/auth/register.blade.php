<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PT. Oremus Bahari Mandiri</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="/favicon3.png" type="image/x-icon">

    <!-- Favicon - dengan parameter versi untuk mengatasi cache -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon3.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon3.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Tambahkan meta tag untuk tema browser mobile -->
    <meta name="theme-color" content="#0A3D62">
    <meta name="msapplication-TileColor" content="#0A3D62">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png?v=3">

    <style>
        :root {
            --pastel-blue: #A8D8FF;
            --dark-blue: #0A3D62;
            --ocean-green: #3AB795;
            --light-blue: #E3F2FD;
            --wave-blue: #64B5F6;
            --ocean-blue: #0084ff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--ocean-blue) 50%, var(--wave-blue) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Ocean Background Effects */
        .ocean-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .wave-container {
            position: absolute;
            bottom: 0;
            left: 0;
            margin-top: 80px;
            width: 100%;
            height: 120px;
            overflow: hidden;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg"><path d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18.19 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z" opacity=".25" fill="%23ffffff"/><path d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".15" fill="%23ffffff"/><path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" fill="%23ffffff" opacity=".1"/></svg>') repeat-x;
            background-size: 1200px 120px;
            animation: wave 20s linear infinite;
        }

        .wave:nth-child(2) {
            bottom: 10px;
            animation: wave 15s linear reverse infinite;
            opacity: 0.7;
        }

        .wave:nth-child(3) {
            bottom: 20px;
            animation: wave 30s linear infinite;
            opacity: 0.5;
        }

        @keyframes wave {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(1px);
            animation: rise 15s infinite ease-in;
        }

        @keyframes rise {
            0% {
                bottom: -100px;
                transform: translateX(0);
                opacity: 1;
            }

            100% {
                bottom: 100%;
                transform: translateX(100px);
                opacity: 0;
            }
        }

        /* Register Container */
        .register-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            padding: 0;
            width: 100%;
            max-width: 900px;
            display: flex;
            overflow: hidden;
            position: relative;
            z-index: 10;
            min-height: 600px;
            margin-top: -30px;
        }

        .register-left {
            flex: 1;
            background: linear-gradient(135deg, #87CEEB 0%, var(--ocean-blue) 100%);
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .register-left::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>') repeat;
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
            }
        }

        .company-logo {
            position: relative;
            z-index: 2;
        }

        /* Updated logo styling to use image */
        .logo-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            padding: 10px;
        }

        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }

        .company-name {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .welcome-text {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.8;
        }

        .register-right {
            flex: 1;
            padding: 40px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-title {
            font-size: 2.2rem;
            color: var(--dark-blue);
            margin-bottom: 10px;
            font-weight: 600;
        }

        .register-subtitle {
            color: #666;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-blue);
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--ocean-green);
            background-color: white;
            box-shadow: 0 0 20px rgba(58, 183, 149, 0.1);
        }

        .form-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .form-input:focus+.form-icon {
            color: var(--ocean-green);
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--ocean-green);
        }

        .register-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--ocean-green) 0%, var(--dark-blue) 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 25px rgba(58, 183, 149, 0.3);
            margin-top: 15px;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(58, 183, 149, 0.4);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        .error-message {
            background-color: #fee;
            color: #c53030;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            border-left: 4px solid #c53030;
        }

        .form-input.error {
            border-color: #c53030;
            background-color: #fef5f5;
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #c53030;
        }

        .login-link {
            margin-top: 20px;
            text-align: center;
            font-size: 0.95rem;
        }

        .login-link a {
            color: var(--ocean-green);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: var(--dark-blue);
            text-decoration: underline;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .register-container {
                flex-direction: column;
                max-width: 400px;
                margin: 20px;
            }

            .register-left {
                padding: 30px 20px;
                min-height: 200px;
            }

            .company-name {
                font-size: 1.5rem;
            }

            .logo-icon {
                width: 100px;
                height: 100px;
            }

            .register-right {
                padding: 30px 20px;
            }

            .register-title {
                font-size: 1.8rem;
            }
        }

        @media screen and (max-width: 480px) {
            .register-container {
                margin: 10px;
                border-radius: 15px;
            }

            .form-input {
                padding: 12px 15px 12px 45px;
            }

            .form-icon {
                left: 15px;
            }

            .password-toggle {
                right: 15px;
            }

            .company-name {
                font-size: 1.3rem;
            }

            .register-title {
                font-size: 1.6rem;
            }

            .logo-icon {
                width: 80px;
                height: 80px;
            }
        }

        /* Loading Animation */
        .register-btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .register-btn.loading::after {
            content: '';
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            display: inline-block;
            animation: spin 1s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <!-- Ocean Background Effects -->
    <div class="ocean-bg">
        <div class="wave-container">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
    </div>

    <!-- Register Container -->
    <div class="register-container">
        <!-- Left Side - Company Info -->
        <div class="register-left">
            <div class="company-logo">
                <div class="logo-icon">
                    <img src="/images/obmlogo.png" alt="PT. Oremus Bahari Mandiri Logo">
                </div>
                <div class="company-name">PT. Oremus Bahari Mandiri</div>
            </div>

            <div class="welcome-text">
                Join our maritime excellence network and become part of a team dedicated to providing exceptional shipping services across Indonesian ports.
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="register-right">
            <div class="register-header">
                <h2 class="register-title">Create Account</h2>
                <p class="register-subtitle">Please fill in your information to register</p>
            </div>

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf

                <!-- Name Field -->
                <div class="form-group">
                    <label for="fullname" class="form-label">Full Name</label>
                    <div style="position: relative;">
                        <input id="fullname" type="text" class="form-input @error('fullname') error @enderror" name="fullname" value="{{ old('fullname') }}" autofocus placeholder="Enter your full name">
                        <i class="fas fa-user form-icon"></i>

                        @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="form-label">User Name</label>
                    <div style="position: relative;">
                        <input id="username" type="text" class="form-input @error('username') error @enderror" name="username" value="{{ old('username') }}" autofocus placeholder="Enter your username">
                        <i class="fas fa-user form-icon"></i>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div style="position: relative;">
                        <input id="email" type="email" class="form-input @error('email') error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email address">
                        <i class="fas fa-envelope form-icon"></i>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div style="position: relative;">
                        <input id="password" type="password" class="form-input @error('password') error @enderror" name="password" required autocomplete="new-password" placeholder="Create a password">
                        <i class="fas fa-lock form-icon"></i>
                        <i class="fas fa-eye password-toggle" id="passwordToggle"></i>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <div style="position: relative;">
                        <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                        <i class="fas fa-lock form-icon"></i>
                        <i class="fas fa-eye password-toggle" id="confirmPasswordToggle"></i>
                    </div>
                </div>

                <!-- Register Button -->
                <button type="submit" class="register-btn" id="registerBtn">
                    Register
                </button>

                <!-- Login Link -->
                <div class="login-link">
                    Already have an account? <a href="{{ route('login') }}">Sign In</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Create floating bubbles
        function createBubbles() {
            const oceanBg = document.querySelector('.ocean-bg');

            for (let i = 0; i < 15; i++) {
                const bubble = document.createElement('div');
                bubble.className = 'bubble';

                const size = Math.random() * 10 + 5;
                bubble.style.width = size + 'px';
                bubble.style.height = size + 'px';
                bubble.style.left = Math.random() * 100 + '%';
                bubble.style.animationDelay = Math.random() * 15 + 's';
                bubble.style.animationDuration = (Math.random() * 10 + 10) + 's';

                oceanBg.appendChild(bubble);
            }
        }

        // Password toggle functionality
        document.getElementById('passwordToggle').addEventListener('click', function() {
            togglePasswordVisibility('password', this);
        });

        document.getElementById('confirmPasswordToggle').addEventListener('click', function() {
            togglePasswordVisibility('password-confirm', this);
        });

        function togglePasswordVisibility(inputId, toggleIcon) {
            const passwordInput = document.getElementById(inputId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Form submission with loading state
        document.getElementById('registerForm').addEventListener('submit', function() {
            const registerBtn = document.getElementById('registerBtn');
            registerBtn.classList.add('loading');
            registerBtn.textContent = 'Registering';
        });

        // Initialize bubbles when page loads
        document.addEventListener('DOMContentLoaded', function() {
            createBubbles();

            // Add focus animations
            document.querySelectorAll('.form-input').forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });

                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>

</html>