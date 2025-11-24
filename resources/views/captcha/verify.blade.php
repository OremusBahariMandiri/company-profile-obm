<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi - Oremus Bahari Mandiri</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2c5aa0 0%, #1e3a5f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .verification-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 3rem 2rem;
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        .company-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #2c5aa0 0%, #1e3a5f 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .company-logo i {
            color: white;
            font-size: 2rem;
        }

        .company-name {
            color: #2c5aa0;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .verification-text {
            color: #495057;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .checkbox-container {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 2rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .checkbox-container:hover {
            border-color: #2c5aa0;
            background: #f0f7ff;
        }

        .custom-checkbox {
            width: 25px;
            height: 25px;
            accent-color: #2c5aa0;
            cursor: pointer;
        }

        .checkbox-label {
            font-size: 1.1rem;
            color: #495057;
            font-weight: 600;
            margin: 0;
            cursor: pointer;
        }

        .btn-continue {
            background: linear-gradient(135deg, #2c5aa0 0%, #1e3a5f 100%);
            border: none;
            border-radius: 25px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        .btn-continue:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(44, 90, 160, 0.3);
        }

        .btn-continue:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .security-note {
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="verification-card">
            <div class="company-logo">
                <i class="fas fa-anchor"></i>
            </div>

            <div class="company-name">
                Oremus Bahari Mandiri
            </div>

            <div class="verification-text">
                Silahkan tekan "Saya Bukan Robot" untuk melanjutkan aktivitas
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('captcha.verify') }}" id="verificationForm">
                @csrf

                <div class="checkbox-container" onclick="toggleCheckbox()">
                    <input type="checkbox"
                           id="human_check"
                           name="human_check"
                           class="custom-checkbox"
                           required>
                    <label for="human_check" class="checkbox-label">
                        <i class="fas fa-user-check"></i> Saya Bukan Robot
                    </label>
                </div>
                @error('human_check')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary btn-continue" id="continueBtn" disabled>
                    <i class="fas fa-arrow-right"></i> Lanjutkan
                </button>
            </form>

            <div class="security-note">
                <i class="fas fa-shield-alt"></i>
                Verifikasi ini melindungi website dari spam dan bot
            </div>
        </div>
    </div>

    <script>
        function toggleCheckbox() {
            const checkbox = document.getElementById('human_check');
            checkbox.checked = !checkbox.checked;
            updateContinueButton();
        }

        function updateContinueButton() {
            const checkbox = document.getElementById('human_check');
            const continueBtn = document.getElementById('continueBtn');

            if (checkbox.checked) {
                continueBtn.disabled = false;
                continueBtn.style.background = 'linear-gradient(135deg, #2c5aa0 0%, #1e3a5f 100%)';
            } else {
                continueBtn.disabled = true;
                continueBtn.style.background = '#ccc';
            }
        }

        document.getElementById('human_check').addEventListener('change', updateContinueButton);

        // Prevent form submission if checkbox is not checked
        document.getElementById('verificationForm').addEventListener('submit', function(e) {
            const checkbox = document.getElementById('human_check');
            if (!checkbox.checked) {
                e.preventDefault();
                alert('Silahkan centang "Saya Bukan Robot" terlebih dahulu');
            }
        });
    </script>
</body>
</html>