@extends('frontend.app')
@section('title', 'Home')
@section('content')

{{-- preloader --}}
@include('frontend.partials.preloader')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1 class="hero-title">Restaurant POS SaaS System</h1>
        <p class="hero-subtitle">Cloud based POS with subscription for restaurants, cafes and shops</p>
        <button class="btn btn-primary btn-lg" onclick="window.location.href='register.html'">Get Started</button>
    </div>
    <div class="hero-background"></div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="section-container">
        <h2 class="section-title">Powerful Features</h2>
        <p class="section-subtitle">Everything you need to manage your restaurant efficiently</p>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" fill="#E0E7FF" />
                        <path d="M20 10V30M10 20H30" stroke="#2563EB" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <h3>Point of Sale</h3>
                <p>Fast and intuitive POS interface with barcode scanning and quick menu access</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" fill="#F0FDFA" />
                        <path d="M10 25L16 18L22 24L30 12" stroke="#14B8A6" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <h3>Reports & Analytics</h3>
                <p>Real-time sales reports, inventory tracking, and business analytics</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" fill="#FEF3C7" />
                        <circle cx="20" cy="20" r="6" fill="#F59E0B" />
                        <circle cx="20" cy="20" r="3" fill="white" />
                    </svg>
                </div>
                <h3>Cloud Storage</h3>
                <p>Secure cloud backup of all your data with 99.9% uptime guarantee</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" fill="#DBEAFE" />
                        <path d="M14 20C14 25.52 17.58 30 22 30C26.42 30 30 25.52 30 20" stroke="#0EA5E9"
                            stroke-width="2" stroke-linecap="round" />
                        <path d="M22 12V20" stroke="#0EA5E9" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <h3>Subscription Ready</h3>
                <p>Built-in payment processing and subscription management</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" fill="#F3E8FF" />
                        <path d="M12 22L18 28L28 12" stroke="#7C3AED" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <h3>Multi-User Access</h3>
                <p>Support for multiple staff members with role-based access control</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" fill="#FEE2E2" />
                        <circle cx="20" cy="20" r="8" stroke="#EF4444" stroke-width="2" />
                        <path d="M20 16V24M16 20H24" stroke="#EF4444" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <h3>24/7 Support</h3>
                <p>Dedicated customer support team available round the clock</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Preview Section -->
<section class="pricing-preview">
    <div class="section-container">
        <h2 class="section-title">Simple Pricing</h2>
        <p class="section-subtitle">Choose the plan that works best for your business</p>

        <div class="pricing-cards">
            <div class="pricing-card">
                <h3>Starter</h3>
                <div class="price">$29<span>/month</span></div>
                <ul class="pricing-features">
                    <li>✓ Single Register</li>
                    <li>✓ Basic Reports</li>
                    <li>✓ Cloud Backup</li>
                    <li>✓ Email Support</li>
                </ul>
                <button class="btn btn-outline" onclick="window.location.href='pricing.html'">Learn More</button>
            </div>

            <div class="pricing-card featured">
                <div class="badge">Popular</div>
                <h3>Business</h3>
                <div class="price">$79<span>/month</span></div>
                <ul class="pricing-features">
                    <li>✓ 5 Registers</li>
                    <li>✓ Advanced Reports</li>
                    <li>✓ Inventory Management</li>
                    <li>✓ Priority Support</li>
                </ul>
                <button class="btn btn-primary" onclick="window.location.href='register.html'">Get Started</button>
            </div>

            <div class="pricing-card">
                <h3>Premium</h3>
                <div class="price">$199<span>/month</span></div>
                <ul class="pricing-features">
                    <li>✓ Unlimited Registers</li>
                    <li>✓ Custom Reports</li>
                    <li>✓ Staff Management</li>
                    <li>✓ Phone & Email Support</li>
                </ul>
                <button class="btn btn-outline" onclick="window.location.href='pricing.html'">Learn More</button>
            </div>
        </div>
    </div>
</section>
@endsection