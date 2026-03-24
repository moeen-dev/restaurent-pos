@extends('frontend.app')
@section('title', 'Contact')
@section('content')
<!-- Hero Section -->
<section class="hero hero-small">
    <div class="hero-content">
        <h1 class="hero-title">Get In Touch</h1>
        <p class="hero-subtitle">We'd love to hear from you. Send us a message!</p>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="section-container">
        <div class="contact-wrapper">
            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <h2>Send us a Message</h2>
                <form id="contactForm" class="contact-form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="6" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                    <div id="formMessage" class="form-message"></div>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="contact-info">
                <h2>Contact Information</h2>

                <div class="info-item">
                    <div class="info-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z"
                                fill="#2563EB" opacity="0.1" />
                            <path
                                d="M12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4Z"
                                fill="none" stroke="#2563EB" stroke-width="2" />
                            <path d="M12 6V12L16 16" fill="none" stroke="#2563EB" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                    <div>
                        <h4>Business Hours</h4>
                        <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                        <p>Saturday - Sunday: Closed</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M17 10.5V7C17 5.9 16.1 5 15 5H1C0.9 5 0.9 5 0.9 5.1V17C0.9 18.1 1.9 19 3 19H17C18.1 19 19 18.1 19 17V12.5C19 11.4 18.1 10.5 17 10.5Z"
                                fill="#2563EB" opacity="0.1" />
                            <path
                                d="M17 10.5V7C17 5.9 16.1 5 15 5H1C0.9 5 0.9 5 0.9 5.1V17C0.9 18.1 1.9 19 3 19H17C18.1 19 19 18.1 19 17V12.5C19 11.4 18.1 10.5 17 10.5Z"
                                fill="none" stroke="#2563EB" stroke-width="2" />
                            <path d="M1 5L8 10.46L15 5" fill="none" stroke="#2563EB" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div>
                        <h4>Email</h4>
                        <p><a href="mailto:support@smartpos.com">support@smartpos.com</a></p>
                        <p><a href="mailto:sales@smartpos.com">sales@smartpos.com</a></p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M17 10.5V7C17 5.9 16.1 5 15 5H1C0.9 5 0.9 5 0.9 5.1V17C0.9 18.1 1.9 19 3 19H17C18.1 19 19 18.1 19 17V12.5C19 11.4 18.1 10.5 17 10.5Z"
                                fill="#2563EB" opacity="0.1" />
                            <path
                                d="M22 16.92V19.5C22 20.05 21.56 20.5 21 20.5C10.56 20.5 2.5 12.43 2.5 2C2.5 1.44 2.95 1 3.5 1H6.07C6.62 1 7.07 1.45 7.07 2C7.07 3.84 7.3 5.54 7.75 7.07C7.93 7.66 7.73 8.3 7.18 8.71L5.16 10.74C6.5 13.07 8.93 15.5 11.26 16.84L13.29 14.82C13.7 14.27 14.33 14.07 14.92 14.25C16.45 14.7 18.16 14.93 19.99 14.93C20.55 14.93 21 15.38 21 15.94V16.92Z"
                                stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div>
                        <h4>Phone</h4>
                        <p><a href="tel:+1234567890">+1 (234) 567-890</a></p>
                        <p>24/7 Support Line Available</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z"
                                fill="#2563EB" opacity="0.1" />
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z"
                                fill="none" stroke="#2563EB" stroke-width="2" />
                            <path d="M8 12H16M12 8V16" fill="none" stroke="#2563EB" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                    <div>
                        <h4>Location</h4>
                        <p>123 Business Street</p>
                        <p>Tech City, TC 12345</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection