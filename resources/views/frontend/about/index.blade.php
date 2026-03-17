@extends('frontend.app')
@section('title', 'About Us')
@section('content')
<!-- Hero Section -->
<section class="hero hero-small">
    <div class="hero-content">
        <h1 class="hero-title">About SmartPOS</h1>
        <p class="hero-subtitle">Building better tools for restaurants worldwide</p>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="section-container">
        <div class="about-content">
            <h2>Our Story</h2>
            <p>SmartPOS was founded by restaurant industry veterans who understood the pain points of managing a modern
                restaurant. We created a cloud-based POS system that combines simplicity with powerful features.</p>
            <p>Today, hundreds of restaurants, cafes, and shops across multiple countries use SmartPOS to streamline
                their operations and improve customer experience.</p>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose">
    <div class="section-container">
        <h2 class="section-title">Why Choose SmartPOS?</h2>
        <p class="section-subtitle">We've built the POS system restaurants actually want to use</p>

        <div class="reasons-grid">
            <div class="reason-card">
                <h3>Easy to Use</h3>
                <p>Intuitive interface that requires minimal training. Your staff will be productive from day one.</p>
            </div>
            <div class="reason-card">
                <h3>Reliable & Secure</h3>
                <p>Enterprise-grade security with 99.9% uptime. Your data is protected with industry-standard
                    encryption.</p>
            </div>
            <div class="reason-card">
                <h3>Affordable</h3>
                <p>No hidden fees. Transparent pricing that scales with your business from startup to chain.</p>
            </div>
            <div class="reason-card">
                <h3>Amazing Support</h3>
                <p>Our dedicated support team is available 24/7 to help you succeed with SmartPOS.</p>
            </div>
        </div>
    </div>
</section>

<!-- Features List Section -->
<section class="features-list">
    <div class="section-container">
        <h2 class="section-title">Complete Feature Set</h2>

        <div class="features-two-column">
            <div class="feature-list-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="#22C55E" />
                </svg>
                <div>
                    <h4>Fast Checkout</h4>
                    <p>Lightning-fast transaction processing</p>
                </div>
            </div>

            <div class="feature-list-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="#22C55E" />
                </svg>
                <div>
                    <h4>Inventory Management</h4>
                    <p>Real-time stock tracking and alerts</p>
                </div>
            </div>

            <div class="feature-list-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="#22C55E" />
                </svg>
                <div>
                    <h4>Sales Reports</h4>
                    <p>Comprehensive sales and revenue analytics</p>
                </div>
            </div>

            <div class="feature-list-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="#22C55E" />
                </svg>
                <div>
                    <h4>Payment Processing</h4>
                    <p>Support for all major payment methods</p>
                </div>
            </div>

            <div class="feature-list-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="#22C55E" />
                </svg>
                <div>
                    <h4>Staff Management</h4>
                    <p>Employee profiles with role-based permissions</p>
                </div>
            </div>

            <div class="feature-list-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="#22C55E" />
                </svg>
                <div>
                    <h4>Cloud Sync</h4>
                    <p>Automatic syncing across multiple locations</p>
                </div>
            </div>

            <div class="feature-list-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="#22C55E" />
                </svg>
                <div>
                    <h4>Security</h4>
                    <p>Enterprise-grade encryption and compliance</p>
                </div>
            </div>

            <div class="feature-list-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="#22C55E" />
                </svg>
                <div>
                    <h4>24/7 Support</h4>
                    <p>Dedicated support available anytime</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection