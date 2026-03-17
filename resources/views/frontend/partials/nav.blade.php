<!-- Navigation Bar -->
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <rect width="32" height="32" rx="8" fill="#2563EB" />
                <text x="16" y="22" font-size="20" font-weight="bold" fill="white" text-anchor="middle">S</text>
            </svg>
            <span>SmartPOS</span>
        </div>
        <ul class="nav-menu" id="navMenu">
            <li><a href="{{ route('home') }}" class="nav-link{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="pricing.html" class="nav-link">Pricing</a></li>
            <li><a href="contact.html" class="nav-link">Contact</a></li>
            <li><a href="login.html" class="nav-link">Login</a></li>
            <li><a href="register.html" class="nav-link nav-register">Register</a></li>
        </ul>
        <div class="hamburger" id="hamburger">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </div>
    </div>
</nav>