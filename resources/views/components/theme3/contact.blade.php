@props([])

@php
    $user = \App\Models\User::first();
@endphp

<style>
    /* ============================================
       THEME 3 CONTACT - MODERN GLASS DESIGN
       ============================================ */

    :root {
        --t3-contact-bg: #f8fafc;
        --t3-contact-surface: #ffffff;
        --t3-contact-text: #1a202c;
        --t3-contact-text-muted: #4a5568;
        --t3-contact-accent: #00cc7a;
        --t3-contact-accent-2: #0099cc;
        --t3-contact-border: rgba(0, 204, 122, 0.15);
        --t3-contact-shadow: 0 15px 50px rgba(0, 204, 122, 0.12);
        --t3-contact-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
        --t3-contact-input-bg: rgba(0, 0, 0, 0.03);
    }

    [data-theme="dark"] {
        --t3-contact-bg: #0a0a12;
        --t3-contact-surface: #151522;
        --t3-contact-text: #ffffff;
        --t3-contact-text-muted: #b4c6e0;
        --t3-contact-accent: #00ff9d;
        --t3-contact-accent-2: #00d4ff;
        --t3-contact-border: rgba(0, 255, 157, 0.15);
        --t3-contact-shadow: 0 15px 50px rgba(0, 255, 157, 0.25);
        --t3-contact-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
        --t3-contact-input-bg: rgba(255, 255, 255, 0.05);
    }

    /* Section */
    .t3-contact-section {
        background: var(--t3-contact-bg);
        padding: 8rem 0;
        position: relative;
        overflow: hidden;
    }

    /* Background Orbs */
    .t3-contact-orb {
        position: absolute;
        border-radius: 50%;
        background: var(--t3-contact-gradient);
        filter: blur(120px);
        opacity: 0.08;
        pointer-events: none;
        z-index: 0;
    }

    .t3-contact-orb-1 {
        width: 600px;
        height: 600px;
        top: -10%;
        left: -10%;
    }

    .t3-contact-orb-2 {
        width: 500px;
        height: 500px;
        bottom: -10%;
        right: -10%;
    }

    /* Container */
    .t3-contact-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
        width: 100%;
        box-sizing: border-box;
    }

    /* Header */
    .t3-contact-header {
        text-align: center;
        margin-bottom: 5rem;
    }

    .t3-contact-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        margin-bottom: 1.25rem;
        color: var(--t3-contact-text);
        letter-spacing: -0.03em;
    }

    .t3-contact-title-accent {
        background: var(--t3-contact-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .t3-contact-subtitle {
        font-size: 1.125rem;
        color: var(--t3-contact-text-muted);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Layout Grid */
    .t3-contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 4rem;
        align-items: start;
    }

    /* Contact Info Card */
    .t3-info-card {
        background: var(--t3-contact-surface);
        border: 1px solid var(--t3-contact-border);
        border-radius: 24px;
        padding: 3rem;
        box-shadow: var(--t3-contact-shadow);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .t3-info-item {
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .t3-info-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        background: rgba(0, 204, 122, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--t3-contact-accent);
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .t3-info-item:hover .t3-info-icon {
        background: var(--t3-contact-gradient);
        color: white;
        transform: scale(1.1) rotate(-5deg);
        box-shadow: 0 10px 20px rgba(0, 204, 122, 0.3);
    }

    .t3-info-content h4 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--t3-contact-text);
        margin-bottom: 0.5rem;
    }

    .t3-info-content p,
    .t3-info-content a {
        font-size: 1rem;
        color: var(--t3-contact-text-muted);
        line-height: 1.6;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .t3-info-content a:hover {
        color: var(--t3-contact-accent);
    }

    /* Social Links */
    .t3-social-links {
        display: flex;
        gap: 1rem;
        margin-top: auto;
    }

    .t3-social-btn {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        border: 1px solid var(--t3-contact-border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--t3-contact-text-muted);
        font-size: 1.25rem;
        transition: all 0.3s ease;
        background: var(--t3-contact-surface);
    }

    .t3-social-btn:hover {
        background: var(--t3-contact-gradient);
        color: white;
        border-color: transparent;
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 204, 122, 0.25);
    }

    /* Contact Form */
    .t3-form-card {
        background: var(--t3-contact-surface);
        border: 1px solid var(--t3-contact-border);
        border-radius: 24px;
        padding: 3rem;
        box-shadow: var(--t3-contact-shadow);
    }

    .t3-form-group {
        margin-bottom: 1.5rem;
    }

    .t3-form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .t3-form-label {
        display: block;
        font-size: 0.9375rem;
        font-weight: 600;
        color: var(--t3-contact-text);
        margin-bottom: 0.75rem;
    }

    .t3-form-input,
    .t3-form-textarea {
        width: 100%;
        padding: 1rem 1.25rem;
        background: var(--t3-contact-input-bg);
        border: 1px solid var(--t3-contact-border);
        border-radius: 12px;
        font-size: 1rem;
        color: var(--t3-contact-text);
        transition: all 0.3s ease;
    }

    .t3-form-input:focus,
    .t3-form-textarea:focus {
        outline: none;
        border-color: var(--t3-contact-accent);
        background: var(--t3-contact-surface);
        box-shadow: 0 0 0 4px rgba(0, 204, 122, 0.1);
    }

    .t3-form-textarea {
        min-height: 150px;
        resize: vertical;
    }

    .t3-submit-btn {
        width: 100%;
        padding: 1.25rem;
        background: var(--t3-contact-gradient);
        color: white;
        font-weight: 700;
        font-size: 1.125rem;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        margin-top: 1rem;
    }

    .t3-submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0, 204, 122, 0.3);
    }

    /* Success Message */
    .t3-success-message {
        background: rgba(0, 204, 122, 0.1);
        border: 1px solid var(--t3-contact-accent);
        color: var(--t3-contact-accent);
        padding: 1rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 600;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .t3-contact-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }

        .t3-info-card {
            padding: 2rem;
        }
    }

    @media (max-width: 640px) {
        .t3-contact-section {
            padding: 3rem 0 2rem;
        }

        .t3-contact-container {
            padding: 0 1rem;
        }

        .t3-contact-header {
            margin-bottom: 2rem;
        }

        .t3-contact-title {
            font-size: clamp(1.75rem, 6vw, 2.25rem);
            margin-bottom: 0.75rem;
        }

        .t3-contact-subtitle {
            font-size: 0.9375rem;
            padding: 0 0.5rem;
            line-height: 1.6;
        }

        .t3-contact-grid {
            gap: 1.5rem;
        }

        .t3-info-card {
            padding: 1.25rem;
            border-radius: 20px;
        }

        .t3-info-item {
            margin-bottom: 1.5rem;
            gap: 1rem;
        }

        .t3-info-icon {
            width: 42px;
            height: 42px;
            font-size: 1.125rem;
            border-radius: 12px;
        }

        .t3-info-content h4 {
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .t3-info-content p,
        .t3-info-content a {
            font-size: 0.875rem;
        }

        .t3-social-links {
            gap: 0.75rem;
            margin-top: 1.5rem;
            justify-content: center;
        }

        .t3-social-btn {
            width: 40px;
            height: 40px;
            font-size: 1rem;
            border-radius: 10px;
        }

        .t3-form-card {
            padding: 1.25rem;
            border-radius: 20px;
        }

        .t3-form-group {
            margin-bottom: 1rem;
        }

        /* Stack name and email on mobile */
        .t3-form-row {
            grid-template-columns: 1fr !important;
            gap: 1rem !important;
        }

        .t3-form-label {
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .t3-form-input,
        .t3-form-textarea {
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            border-radius: 10px;
        }

        .t3-form-textarea {
            min-height: 100px;
        }

        .t3-submit-btn {
            padding: 0.875rem;
            font-size: 1rem;
            border-radius: 10px;
            margin-top: 0.5rem;
        }
    }

    @media (max-width: 375px) {
        .t3-contact-section {
            padding: 2.5rem 0 2rem;
        }
        
        .t3-contact-title {
            font-size: 1.5rem;
        }
    }
</style>

<section id="contact" class="t3-contact-section">
    <!-- Background Orbs -->
    <div class="t3-contact-orb t3-contact-orb-1"></div>
    <div class="t3-contact-orb t3-contact-orb-2"></div>

    <div class="t3-contact-container">
        <!-- Header -->
        <div class="t3-contact-header">
            <h2 class="t3-contact-title">
                Let's <span class="t3-contact-title-accent">Connect</span>
            </h2>
            <p class="t3-contact-subtitle">
                Have a project in mind or just want to say hello? I'd love to hear from you.
            </p>
        </div>

        <div class="t3-contact-grid">
            <!-- Contact Info -->
            <div class="t3-info-card">
                <div>
                    <div class="t3-info-item">
                        <div class="t3-info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div class="t3-info-content">
                            <h4>Email Me</h4>
                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                        </div>
                    </div>

                    @if($user->phone)
                        <div class="t3-info-item">
                            <div class="t3-info-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                            </div>
                            <div class="t3-info-content">
                                <h4>Call Me</h4>
                                <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                            </div>
                        </div>
                    @endif

                    @if($user->address)
                        <div class="t3-info-item">
                            <div class="t3-info-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div class="t3-info-content">
                                <h4>Location</h4>
                                <p>{{ $user->address }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="t3-social-links">
                    @if($user->github_url)
                        <a href="{{ $user->github_url }}" target="_blank" class="t3-social-btn" title="GitHub">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                </path>
                            </svg>
                        </a>
                    @endif
                    @if($user->linkedin_url)
                        <a href="{{ $user->linkedin_url }}" target="_blank" class="t3-social-btn" title="LinkedIn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                </path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                    @endif
                    @if($user->twitter_url)
                        <a href="{{ $user->twitter_url }}" target="_blank" class="t3-social-btn" title="Twitter">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                </path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Contact Form -->
            <div class="t3-form-card">
                @if(session('success'))
                    <div class="t3-success-message">
                        <div class="t3-success-message">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            {{ session('success') }}
                        </div>
                @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="portfolio_user_id" value="{{ $user->id }}">

                        <div class="t3-form-row">
                            <div class="t3-form-group">
                                <label for="name" class="t3-form-label">Your Name</label>
                                <input type="text" id="name" name="name" class="t3-form-input" placeholder="John Doe"
                                    required>
                            </div>
                            <div class="t3-form-group">
                                <label for="email" class="t3-form-label">Your Email</label>
                                <input type="email" id="email" name="email" class="t3-form-input"
                                    placeholder="john@example.com" required>
                            </div>
                        </div>

                        <div class="t3-form-group">
                            <label for="subject" class="t3-form-label">Subject</label>
                            <input type="text" id="subject" name="subject" class="t3-form-input"
                                placeholder="Project Inquiry">
                        </div>

                        <div class="t3-form-group">
                            <label for="message" class="t3-form-label">Message</label>
                            <textarea id="message" name="message" class="t3-form-textarea"
                                placeholder="Tell me about your project..." required></textarea>
                        </div>

                        <button type="submit" class="t3-submit-btn">
                            Send Message <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
</section>