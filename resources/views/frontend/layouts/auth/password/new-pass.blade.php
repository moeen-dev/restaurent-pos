<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset | SmartPOS</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
</head>

<body class="auth-page">
    <!-- Top Navigation -->
    <div class="auth-top-nav">
        <div class="auth-nav-container">
            <a href="{{ route('home') }}" class="auth-logo">
                <svg width="28" height="28" viewBox="0 0 32 32" fill="none">
                    <rect width="32" height="32" rx="8" fill="#2563EB" />
                    <text x="16" y="22" font-size="20" font-weight="bold" fill="white" text-anchor="middle">S</text>
                </svg>
                <span>SmartPOS</span>
            </a>
        </div>
    </div>

    <!-- Main Container -->
    <div class="auth-main">
        <!-- Form Card -->
        <div class="auth-form-card">
            <!-- Header -->
            <div class="auth-form-header">
                <h1>Password Reset</h1>
                <p>Please, enter your email to receive a password reset link.</p>
            </div>

            <!-- Form -->
            <form id="loginForm" method="POST" action="{{ route('password.update') }}" class="auth-form">
                @csrf
                <div class="form-group">
                    <label for="email">Enter Your Email to reset your password: <spna class="required">*</spna></label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z"
                                stroke="#64748B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M22 6L12 13L2 6" stroke="#64748B" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="email" name="email" value="{{ $email }}">

                        <input type="password" name="password" required placeholder="Enter new password" required>
                        <input type="password" name="password_confirmation" required placeholder="Confirm new password" required>


                    </div>
                    @if($errors->has('email'))
                    <span class="required">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn-submit">Send Reset Link</button>
            </form>

            <!-- Footer -->
            <div class="auth-form-footer">
                <p>Don't have an account? <a href="{{ route('register') }}">Create one</a></p>
            </div>
        </div>

        <!-- Side Text -->
        <div class="auth-side-text">
            <p>©
                <?php echo date('Y'); ?> SmartPOS. All rights reserved.
            </p>
        </div>
    </div>

    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>

</body>

</html>