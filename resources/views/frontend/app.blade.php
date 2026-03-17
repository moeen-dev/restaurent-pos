<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') SmartPOS - Cloud Based Restaurant POS System</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
</head>

<body>

    {{-- Preloader --}}
    <div id="preloader">
        <div class="pos-container">
            <div class="pos-machine">
                <div class="pos-screen"></div>
                <div class="pos-slot"></div>
            </div>
            <div class="card"></div>
            <div class="loading-text">Loading SmartPOS...</div>
        </div>
    </div>
    <!-- Navigation Bar -->
    @include('frontend.partials.nav')

    {{-- Main Content --}}
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h4>SmartPOS</h4>
                <p>Cloud based Restaurant POS System</p>
            </div>
            <div class="footer-section">
                <h4>Product</h4>
                <ul>
                    <li><a href="about.html">About</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li><a href="#features">Features</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Company</h4>
                <ul>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="#privacy">Privacy</a></li>
                    <li><a href="#terms">Terms</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Account</h4>
                <ul>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 SmartPOS. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
</body>

</html>