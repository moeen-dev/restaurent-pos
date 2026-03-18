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
            <li><a href="{{ route('pricing') }}" class="nav-link{{ request()->routeIs('pricing') ? 'active' : '' }}">Pricing</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            <li><a href="{{ route('login') }}" class="nav-link nav-register">Login</a></li>
        </ul>
        <div class="hamburger" id="hamburger">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </div>
    </div>
</nav>