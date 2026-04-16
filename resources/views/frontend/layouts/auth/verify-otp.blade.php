<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to SmartPOS</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <style>
        #otpTimer {
            font-family: monospace;
            font-size: 14px;
            letter-spacing: 0.5px;
        }
    </style>
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
                <h1>Verify Your Email</h1>
                <p>Please, visit your email to get the verification code.</p>
            </div>

            <!-- Form -->
            <form id="loginForm" method="POST" action="{{ route('register.otp.verify') }}" class="auth-form">
                @csrf
                <div class="form-group">
                    <label for="otp">Enter Your 6 Digits OTP to Verify:</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z"
                                stroke="#64748B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M22 6L12 13L2 6" stroke="#64748B" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <input type="number" name="otp" required placeholder="Enter 6-digit OTP">

                    </div>
                    @if($errors->has('otp'))
                    <span class="required">{{ $errors->first('otp') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn-submit">Verify OTP</button>
                <p id="otpTimer">Loading...</p>
            </form>
            <form method="POST" action="{{ route('register.otp.resend') }}" class="resend-otp-form">
                @csrf
                <button type="submit" id="resendBtn" class="btn-submit">Resend OTP</button>
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

    <script>
        let expiryTime = {{ session('otp_expires_at') ?? 0 }};
        let isExpired = {{ session('otp_expired') ? 'true' : 'false' }};
    </script>

    <!--  Timer Script -->
    <script>
        const timer = document.getElementById("otpTimer");
        const resendBtn = document.getElementById("resendBtn");
        
        // 🔥 If no expiry time OR expired → DO NOT START TIMER
        if (!expiryTime || isExpired) {
            timer.innerText = "OTP has expired. Please request new OTP.";
            timer.style.color = "red";
            resendBtn.style.display = "block";
        } else {

            let lastText = "";
        
            function update() {
                let now = Math.floor(Date.now() / 1000);
                let remaining = expiryTime - now;
        
                if (remaining <= 0) { 
                    timer.innerText="OTP has expired. Please request new OTP." ; 
                    timer.style.color="red" ;
                    resendBtn.style.display="block" ; 
                    return; 
                } 
                resendBtn.style.display="none" ; 

                let m=String(Math.floor(remaining / 60)).padStart(2, "0" ); 
                let s=String(remaining % 60).padStart(2, "0" );

                let newText=`OTP Expires in: ${m}:${s}`;

                if (newText !==lastText) {
                    timer.innerText=newText; lastText=newText;
                } 
                
                setTimeout(update, 1000); 
            } 
            
            update(); 
        }
    </script>

</body>

</html>