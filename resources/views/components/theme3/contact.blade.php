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

    .t3-contact-orb-1 { width: 600px; height: 600px; top: -10%; left: -10%; }
    .t3-contact-orb-2 { width: 500px; height: 500px; bottom: -10%; right: -10%; }

    /* Container */
    .t3-contact-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
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

    .t3-info-content p, .t3-info-content a {
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

    .t3-form-label {
        display: block;
        font-size: 0.9375rem;
        font-weight: 600;
        color: var(--t3-contact-text);
        margin-bottom: 0.75rem;
    }

    .t3-form-input, .t3-form-textarea {
        width: 100%;
        padding: 1rem 1.25rem;
        background: var(--t3-contact-input-bg);
        border: 1px solid var(--t3-contact-border);
        border-radius: 12px;
        font-size: 1rem;
        color: var(--t3-contact-text);
        transition: all 0.3s ease;
    }

    .t3-form-input:focus, .t3-form-textarea:focus {
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
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="t3-info-content">
                            <h4>Email Me</h4>
                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                        </div>
                    </div>

                    @if($user->phone)
                    <div class="t3-info-item">
                        <div class="t3-info-icon">
                            <i class="fas fa-phone-alt"></i>
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
                            <i class="fas fa-map-marker-alt"></i>
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
                            <i class="fab fa-github"></i>
                        </a>
                    @endif
                    @if($user->linkedin_url)
                        <a href="{{ $user->linkedin_url }}" target="_blank" class="t3-social-btn" title="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    @endif
                    @if($user->twitter_url)
                        <a href="{{ $user->twitter_url }}" target="_blank" class="t3-social-btn" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Contact Form -->
            <div class="t3-form-card">
                @if(session('success'))
                    <div class="t3-success-message">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="portfolio_user_id" value="{{ $user->id }}">
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                        <div class="t3-form-group">
                            <label for="name" class="t3-form-label">Your Name</label>
                            <input type="text" id="name" name="name" class="t3-form-input" placeholder="John Doe" required>
                        </div>
                        <div class="t3-form-group">
                            <label for="email" class="t3-form-label">Your Email</label>
                            <input type="email" id="email" name="email" class="t3-form-input" placeholder="john@example.com" required>
                        </div>
                    </div>

                    <div class="t3-form-group">
                        <label for="subject" class="t3-form-label">Subject</label>
                        <input type="text" id="subject" name="subject" class="t3-form-input" placeholder="Project Inquiry">
                    </div>

                    <div class="t3-form-group">
                        <label for="message" class="t3-form-label">Message</label>
                        <textarea id="message" name="message" class="t3-form-textarea" placeholder="Tell me about your project..." required></textarea>
                    </div>

                    <button type="submit" class="t3-submit-btn">
                        Send Message <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>