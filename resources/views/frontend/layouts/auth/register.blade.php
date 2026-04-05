<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - SmartPOS</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@26.9.2/build/css/intlTelInput.css">

    <style>
        .iti {
            width: 100%;
        }

        .iti input {
            width: 100% !important;
            padding-left: 90px !important;
            /* space for +880 */
            box-sizing: border-box;
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
                <h1>Create Account</h1>
                <p>Start your POS subscription today</p>
            </div>

            <!-- Form -->
            <form id="registerForm" method="POST" action="{{ route('register.submit') }}" class="auth-form">
                @csrf
                <div class="form-group">
                    <label for="restaurant_name">Full Name of Restaurant <span class="required">*</span> </label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M3 10.5L12 3l9 7.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1V10.5z"
                                stroke="#64748B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input type="text" id="restaurant_name" name="restaurant_name" placeholder="Restaurant Name"
                            required>
                        @if($errors->has('restaurant_name'))
                        <small class="required">{{ $errors->first('restaurant_name') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="restaurant_owner_name">Restaurant Owner Name <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M20 21V19C20 17.9 19.1 17 18 17H6C4.9 17 4 17.9 4 19V21" stroke="#64748B"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <circle cx="12" cy="7" r="4" stroke="#64748B" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <input type="text" id="name" name="name" placeholder="Owner Name" required>
                        @if($errors->has('name'))
                        <small class="required">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="restaurant_address">Restaurant Address <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M12 21s7-5.5 7-12a7 7 0 1 0-14 0c0 6.5 7 12 7 12z" stroke="#64748B"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <circle cx="12" cy="9" r="2.5" stroke="#64748B" stroke-width="2" />
                        </svg>
                        <input type="text" id="address" name="address" placeholder="Restaurant Address" required>
                        @if($errors->has('address'))
                        <small class="required">{{ $errors->first('address') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z"
                                stroke="#64748B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M22 6L12 13L2 6" stroke="#64748B" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <input type="email" id="email" name="email" placeholder="Email Address" required>
                        @if($errors->has('email'))
                        <small class="required">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number <span class="required">*</span></label>

                    <div class="input-wrapper">
                        <input type="tel" id="phone" name="phone" required>
                        <input type="hidden" id="phone_full" name="phone_full">
                    </div>
                    @if($errors->has('phone_full'))
                    <small class="required">{{ $errors->first('phone_full') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Password <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M12 1C6.48 1 2 5.48 2 11V21H4V15H20V21H22V11C22 5.48 17.52 1 12 1Z" fill="none"
                                stroke="#64748B" stroke-width="1.5" />
                            <circle cx="12" cy="8" r="2" fill="#64748B" />
                        </svg>
                        <input type="password" id="password" name="password" placeholder="At least 8 characters"
                            required>
                        @if($errors->has('password'))
                        <small class="required">{{ $errors->first('password') }}</small>
                        @endif
                        <button type="button" class="toggle-password" id="togglePassword1" title="Show password">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M12 5C7 5 2.73 8.11 1 12.46C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.46C21.27 8.11 17 5 12 5Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm Password <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M12 1C6.48 1 2 5.48 2 11V21H4V15H20V21H22V11C22 5.48 17.52 1 12 1Z" fill="none"
                                stroke="#64748B" stroke-width="1.5" />
                            <circle cx="12" cy="8" r="2" fill="#64748B" />
                        </svg>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirm your password" required>
                        @if($errors->has('password_confirmation'))
                        <small class="required">{{ $errors->first('password_confirmation') }}</small>
                        @endif
                        <button type="button" class="toggle-password" id="togglePassword2" title="Show password">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M12 5C7 5 2.73 8.11 1 12.46C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.46C21.27 8.11 17 5 12 5Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="checkbox-wrapper">
                        <input type="checkbox" name="terms" required>
                        <span class="checkbox-label">I agree to the <a href="#terms">Terms</a> and <a
                                href="#privacy">Privacy Policy</a></span>
                    </label>
                </div>

                <button type="submit" class="btn-submit">Create Account</button>
                <div id="formMessage" class="form-message"></div>
            </form>

            <!-- Footer -->
            <div class="auth-form-footer">
                <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            </div>
        </div>

        <!-- Side Text -->
        <div class="auth-side-text">
            <p>© 2024 SmartPOS. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@26.9.2/build/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#phone");
    
        const iti = window.intlTelInput(input, {
            initialCountry: "bd",
            separateDialCode: true,
            loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@26.9.2/build/js/utils.js"),
        });
    
        const form = document.querySelector("#registerForm");
    
        form.addEventListener("submit", function (e) {
            const fullNumber = iti.getNumber(); 
    
            document.querySelector("#phone_full").value = fullNumber;
        });
    </script>

    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
</body>

</html>