@extends('frontend.app')
@section('title', 'Pricing')
@section('content')
<!-- Hero Section -->
<section class="hero hero-small">
    <div class="hero-content">
        <h1 class="hero-title">Simple, Transparent Pricing</h1>
        <p class="hero-subtitle">Choose the perfect plan for your restaurant</p>
    </div>
</section>

<!-- Pricing Plans Section -->
<section class="pricing-section">
    <div class="section-container">
        <div class="pricing-toggle">
            <span>Monthly</span>
            <label class="toggle-switch">
                <input type="checkbox" id="billingToggle">
                <span class="slider"></span>
            </label>
            <span>Annual <span class="saving">Save 20%</span></span>
        </div>

        <div class="pricing-cards-full">
            <!-- Starter Plan -->
            <div class="pricing-card-full">
                <h3>Starter</h3>
                <div class="price-section">
                    <div class="price" id="starter-price">$29<span>/month</span></div>
                    <p class="price-note">Perfect for small restaurants</p>
                </div>
                <ul class="pricing-features-full">
                    <li><span class="check">✓</span> 1 Point of Sale Register</li>
                    <li><span class="check">✓</span> Basic Sales Reports</li>
                    <li><span class="check">✓</span> Cloud Backup</li>
                    <li><span class="check">✓</span> Up to 2 Staff Members</li>
                    <li><span class="check">✓</span> Email Support</li>
                    <li><span class="check">✓</span> 5GB Storage</li>
                    <li class="unavailable"><span class="cross">✗</span> Inventory Management</li>
                    <li class="unavailable"><span class="cross">✗</span> Gift Cards</li>
                </ul>
                <button class="btn btn-outline btn-block" onclick="window.location.href='register.html'">Get
                    Started</button>
            </div>

            <!-- Business Plan -->
            <div class="pricing-card-full featured">
                <div class="badge">Most Popular</div>
                <h3>Business</h3>
                <div class="price-section">
                    <div class="price" id="business-price">$79<span>/month</span></div>
                    <p class="price-note">Best for growing restaurants</p>
                </div>
                <ul class="pricing-features-full">
                    <li><span class="check">✓</span> 5 Point of Sale Registers</li>
                    <li><span class="check">✓</span> Advanced Sales Reports</li>
                    <li><span class="check">✓</span> Cloud Backup & Sync</li>
                    <li><span class="check">✓</span> Up to 10 Staff Members</li>
                    <li><span class="check">✓</span> Priority Email & Chat Support</li>
                    <li><span class="check">✓</span> 50GB Storage</li>
                    <li><span class="check">✓</span> Full Inventory Management</li>
                    <li><span class="check">✓</span> Gift Card Support</li>
                </ul>
                <button class="btn btn-primary btn-block" onclick="window.location.href='register.html'">Start Free
                    Trial</button>
            </div>

            <!-- Premium Plan -->
            <div class="pricing-card-full">
                <h3>Premium</h3>
                <div class="price-section">
                    <div class="price" id="premium-price">$199<span>/month</span></div>
                    <p class="price-note">For restaurant chains</p>
                </div>
                <ul class="pricing-features-full">
                    <li><span class="check">✓</span> Unlimited Point of Sale Registers</li>
                    <li><span class="check">✓</span> Custom Reports & Analytics</li>
                    <li><span class="check">✓</span> Cloud Backup & Sync</li>
                    <li><span class="check">✓</span> Unlimited Staff Members</li>
                    <li><span class="check">✓</span> 24/7 Phone & Email Support</li>
                    <li><span class="check">✓</span> 500GB Storage</li>
                    <li><span class="check">✓</span> Advanced Inventory Management</li>
                    <li><span class="check">✓</span> Loyalty Program Integration</li>
                </ul>
                <button class="btn btn-outline btn-block" onclick="window.location.href='register.html'">Get
                    Started</button>
            </div>
        </div>
    </div>
</section>

<!-- Features Comparison Section -->
<section class="comparison-section">
    <div class="section-container">
        <h2 class="section-title">Feature Comparison</h2>

        <div class="comparison-table">
            <table>
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Starter</th>
                        <th>Business</th>
                        <th>Premium</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Registers</td>
                        <td>1</td>
                        <td>5</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <td>Staff Members</td>
                        <td>2</td>
                        <td>10</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <td>Storage</td>
                        <td>5GB</td>
                        <td>50GB</td>
                        <td>500GB</td>
                    </tr>
                    <tr>
                        <td>Reports</td>
                        <td>Basic</td>
                        <td>Advanced</td>
                        <td>Custom</td>
                    </tr>
                    <tr>
                        <td>Inventory</td>
                        <td class="unavailable">✗</td>
                        <td>✓</td>
                        <td>Advanced</td>
                    </tr>
                    <tr>
                        <td>Support</td>
                        <td>Email</td>
                        <td>Chat & Email</td>
                        <td>24/7 Phone</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="section-container">
        <h2 class="section-title">Frequently Asked Questions</h2>

        <div class="faq-items">
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Can I change my plan anytime?</h4>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M6 8L10 12L14 8" stroke="#2563EB" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="faq-answer">
                    <p>Yes, you can upgrade or downgrade your plan at any time. Changes take effect immediately and
                        billing is prorated.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h4>Is there a free trial?</h4>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M6 8L10 12L14 8" stroke="#2563EB" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="faq-answer">
                    <p>All plans include a 30-day free trial. No credit card required to start.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h4>What payment methods do you accept?</h4>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M6 8L10 12L14 8" stroke="#2563EB" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="faq-answer">
                    <p>We accept all major credit cards, bank transfers, and popular digital payment methods.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h4>Can I cancel anytime?</h4>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M6 8L10 12L14 8" stroke="#2563EB" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="faq-answer">
                    <p>Yes, you can cancel your subscription anytime without penalties or hidden fees.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection