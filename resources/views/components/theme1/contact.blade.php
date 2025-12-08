@props(['user', 'contactContent', 'portfolioOwnerId' => null])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON & AURORA SOFT LIGHT
       Internal Styles for Contact Component
       ========================================== */

    :root {
        /* DARK THEME (Cosmic Neon) - Default */
        --t1-bg-primary: #0B0F1A;
        --t1-bg-secondary: #0F0A21;
        --t1-surface-card: rgba(26, 16, 51, 0.6);
        --t1-text-primary: #FFFFFF;
        --t1-text-secondary: #C7C7D2;
        --t1-text-muted: #9A9AB3;
        --t1-accent-primary: #A56BFF;
        --t1-accent-glow: #C68BFF;
        --t1-accent-secondary: #F0B54A;
        --t1-accent-secondary-glow: #F7CA57;
        --t1-glow-color: rgba(145, 80, 255, 0.35);
        --t1-icon-glow: rgba(168, 100, 255, 0.6);
        --t1-btn-glow: rgba(130, 70, 255, 0.4);
        --t1-card-shadow: 0 8px 32px 0 rgba(120, 60, 255, 0.25);
        --t1-gradient-primary: linear-gradient(135deg, #A56BFF 0%, #5E3AE8 100%);
        --t1-gradient-secondary: linear-gradient(135deg, #FBD16B 0%, #E8A93C 100%);
        --t1-border-color: rgba(165, 107, 255, 0.2);
    }

    [data-theme="light"] {
        /* LIGHT THEME (Aurora Soft Light) */
        --t1-bg-primary: #F8F9FC;
        --t1-bg-secondary: #FAFBFF;
        --t1-surface-card: rgba(255, 255, 255, 0.7);
        --t1-text-primary: #1A1D23;
        --t1-text-secondary: #6B7280;
        --t1-text-muted: #9CA3AF;
        --t1-accent-primary: #7A5AF8;
        --t1-accent-glow: #8F6BFF;
        --t1-accent-secondary: #E89B0C;
        --t1-accent-secondary-glow: #F7B52C;
        --t1-glow-color: rgba(122, 90, 248, 0.12);
        --t1-icon-glow: rgba(122, 90, 248, 0.2);
        --t1-btn-glow: rgba(122, 90, 248, 0.15);
        --t1-card-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.06);
        --t1-gradient-primary: linear-gradient(135deg, #8B5CFF 0%, #5E3AE8 100%);
        --t1-gradient-secondary: linear-gradient(135deg, #F7C95A 0%, #E8A93C 100%);
        --t1-border-color: rgba(122, 90, 248, 0.15);
    }

    /* Section Layout */
    .t1-contact-section {
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        background: var(--t1-bg-primary);
        font-family: 'Inter', sans-serif;
    }

    .t1-contact-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Title */
    .t1-title-wrapper {
        text-align: center;
        margin-bottom: 4rem;
    }

    .t1-section-title {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 0.5rem;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .t1-title-underline {
        width: 80px;
        height: 4px;
        background: var(--t1-gradient-primary);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* Contact Grid */
    .t1-contact-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 4rem;
        align-items: start;
    }

    @media (min-width: 1024px) {
        .t1-contact-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    /* Contact Info */
    .t1-contact-info h3 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--t1-text-primary);
        margin-bottom: 1rem;
    }

    .t1-contact-desc {
        color: var(--t1-text-secondary);
        font-size: 1.125rem;
        line-height: 1.8;
        margin-bottom: 3rem;
    }

    /* Contact Items */
    .t1-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .t1-contact-icon {
        width: 60px;
        height: 60px;
        border-radius: 1rem;
        background: var(--t1-surface-card);
        border: 1px solid var(--t1-border-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--t1-accent-primary);
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .t1-contact-item:hover .t1-contact-icon {
        transform: scale(1.1);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 0 20px var(--t1-icon-glow);
    }

    .t1-contact-icon svg {
        width: 24px;
        height: 24px;
    }

    .t1-contact-details h4 {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--t1-text-muted);
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .t1-contact-details p,
    .t1-contact-details a {
        font-size: 1.125rem;
        color: var(--t1-text-primary);
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .t1-contact-details a:hover {
        color: var(--t1-accent-primary);
    }

    /* Form Reveal Button Area */
    .t1-form-reveal-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        min-height: 400px;
        background: var(--t1-surface-card);
        border: 1px solid var(--t1-border-color);
        border-radius: 1.5rem;
        padding: 3rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .t1-form-reveal-wrapper:hover {
        border-color: var(--t1-accent-primary);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2), 0 0 20px var(--t1-glow-color);
    }

    .t1-reveal-icon {
        font-size: 3rem;
        color: var(--t1-accent-primary);
        margin-bottom: 1.5rem;
        animation: t1-bounce 2s infinite;
    }

    @keyframes t1-bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-10px);
        }

        60% {
            transform: translateY(-5px);
        }
    }

    .t1-reveal-text {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--t1-text-primary);
        margin-bottom: 0.5rem;
    }

    .t1-reveal-subtext {
        color: var(--t1-text-secondary);
        margin-bottom: 2rem;
    }

    .t1-reveal-btn {
        padding: 1rem 2.5rem;
        background: var(--t1-gradient-primary);
        color: white;
        border: none;
        border-radius: 99px;
        font-weight: 700;
        font-size: 1.125rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px var(--t1-btn-glow);
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
    }

    .t1-reveal-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px var(--t1-btn-glow);
    }

    /* Form Card (Initially Hidden) */
    .t1-form-card {
        background: var(--t1-surface-card);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t1-border-color);
        border-radius: 1.5rem;
        padding: 3rem;
        box-shadow: var(--t1-card-shadow);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        display: none;
        /* Hidden by default */
        opacity: 0;
        transform: translateY(20px);
    }

    .t1-form-card.visible {
        display: block;
        animation: t1-fade-in-up 0.6s forwards;
    }

    @keyframes t1-fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Form Elements */
    .t1-form-group {
        margin-bottom: 1.5rem;
    }

    .t1-form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--t1-text-primary);
        margin-bottom: 0.5rem;
    }

    .t1-form-input,
    .t1-form-textarea {
        width: 100%;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--t1-border-color);
        border-radius: 0.75rem;
        color: var(--t1-text-primary);
        font-family: inherit;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t1-form-input,
    [data-theme="light"] .t1-form-textarea {
        background: rgba(255, 255, 255, 0.6);
    }

    .t1-form-input::placeholder,
    .t1-form-textarea::placeholder {
        color: var(--t1-text-muted);
    }

    .t1-form-input:focus,
    .t1-form-textarea:focus {
        outline: none;
        border-color: var(--t1-accent-primary);
        box-shadow: 0 0 0 3px var(--t1-glow-color);
    }

    .t1-form-textarea {
        resize: vertical;
        min-height: 150px;
    }

    /* Submit Button */
    .t1-submit-btn {
        width: 100%;
        padding: 1rem;
        background: var(--t1-gradient-primary);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px var(--t1-btn-glow);
    }

    .t1-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px var(--t1-btn-glow);
    }

    /* Alert Messages */
    .t1-alert {
        padding: 1rem 1.5rem;
        border-radius: 0.75rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 500;
    }

    .t1-alert-success {
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.3);
        color: #10b981;
    }

    .t1-alert-error {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #ef4444;
    }

    /* Background Blobs */
    .t1-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.3;
        z-index: 0;
        animation: t1-blob-float 15s infinite alternate;
    }

    .t1-blob-1 {
        top: 10%;
        right: 10%;
        width: 500px;
        height: 500px;
        background: var(--t1-accent-glow);
    }

    .t1-blob-2 {
        bottom: 10%;
        left: 10%;
        width: 400px;
        height: 400px;
        background: var(--t1-accent-secondary);
        animation-delay: -7s;
    }

    @keyframes t1-blob-float {
        0% {
            transform: translate(0, 0) scale(1);
        }

        100% {
            transform: translate(40px, -40px) scale(1.1);
        }
    }

    /* Mobile Responsiveness */
    @media (max-width: 640px) {
        .t1-contact-section {
            padding: 4rem 0 3rem;
        }

        .t1-contact-container {
            padding: 0 1rem;
            width: 100%;
            box-sizing: border-box;
        }

        .t1-section-title {
            font-size: clamp(2rem, 8vw, 2.5rem);
            margin-bottom: 2rem;
        }

        .t1-contact-grid {
            gap: 2rem;
        }

        .t1-contact-info h3 {
            font-size: 1.75rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        /* Hide description and items on mobile to reduce clutter (Theme 2 technique) */
        .t1-contact-desc,
        .t1-contact-item {
            display: none;
        }

        .t1-contact-info {
            text-align: center;
            margin-bottom: 0;
        }

        .t1-form-reveal-wrapper {
            min-height: 300px;
            padding: 1.5rem;
        }

        .t1-reveal-icon {
            font-size: 2.5rem;
        }

        .t1-reveal-text {
            font-size: 1.25rem;
        }

        .t1-form-card {
            padding: 1.5rem;
        }

        .t1-submit-btn {
            padding: 0.875rem;
            width: 100%;
        }
    }
</style>

<section id="contact" class="t1-contact-section">
    <!-- Background Elements -->
    <div class="t1-blob t1-blob-1"></div>
    <div class="t1-blob t1-blob-2"></div>

    <div class="t1-contact-container">
        <!-- Title -->
        <div class="t1-title-wrapper">
            <h2 class="t1-section-title">Get In Touch</h2>
            <div class="t1-title-underline"></div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="t1-alert t1-alert-success">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="t1-alert t1-alert-error">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                <div>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Contact Grid -->
        <div class="t1-contact-grid">
            <!-- Left: Contact Info -->
            <div class="t1-contact-info">
                <h3>Let's Work Together</h3>
                <p class="t1-contact-desc">
                    {{ $contactContent['message'] ?? "I'm always interested in hearing about new projects and opportunities. Whether you have a question or just want to say hi, feel free to reach out!" }}
                </p>

                <div>
                    @if($user->email)
                        <div class="t1-contact-item">
                            <div class="t1-contact-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="t1-contact-details">
                                <h4>Email</h4>
                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </div>
                        </div>
                    @endif

                    @if($user->phone)
                        <div class="t1-contact-item">
                            <div class="t1-contact-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="t1-contact-details">
                                <h4>Phone</h4>
                                <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                            </div>
                        </div>
                    @endif

                    @if($user->address)
                        <div class="t1-contact-item">
                            <div class="t1-contact-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="t1-contact-details">
                                <h4>Location</h4>
                                <p>{{ $user->address }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Contact Form / Reveal Button -->
            <div class="t1-contact-right-col">
                <!-- Reveal Button Wrapper -->
                <div id="t1-form-reveal" class="t1-form-reveal-wrapper">
                    <div class="t1-reveal-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h3 class="t1-reveal-text">Have a Project in Mind?</h3>
                    <p class="t1-reveal-subtext">I'm ready to help you build something amazing.</p>
                    <button id="t1-reveal-btn" class="t1-reveal-btn">
                        <span>Send Me a Message</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

                <!-- Actual Form (Hidden Initially) -->
                <div id="t1-contact-form" class="t1-form-card">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="portfolio_user_id" value="{{ $portfolioOwnerId ?? $user->id }}">

                        <div class="t1-form-group">
                            <label for="name" class="t1-form-label">Name</label>
                            <input type="text" id="name" name="name" class="t1-form-input" required
                                placeholder="John Doe" value="{{ old('name') }}">
                        </div>

                        <div class="t1-form-group">
                            <label for="email" class="t1-form-label">Email</label>
                            <input type="email" id="email" name="email" class="t1-form-input" required
                                placeholder="john@example.com" value="{{ old('email') }}">
                        </div>

                        <div class="t1-form-group">
                            <label for="subject" class="t1-form-label">Subject</label>
                            <input type="text" id="subject" name="subject" class="t1-form-input"
                                placeholder="Project Inquiry" value="{{ old('subject') }}">
                        </div>

                        <div class="t1-form-group">
                            <label for="message" class="t1-form-label">Message</label>
                            <textarea id="message" name="message" rows="5" class="t1-form-textarea" required
                                placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="t1-submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const revealBtn = document.getElementById('t1-reveal-btn');
            const revealWrapper = document.getElementById('t1-form-reveal');
            const contactForm = document.getElementById('t1-contact-form');

            if (revealBtn && revealWrapper && contactForm) {
                revealBtn.addEventListener('click', function () {
                    // Hide the reveal wrapper
                    revealWrapper.style.display = 'none';

                    // Show the form with animation
                    contactForm.classList.add('visible');
                });
            }
        });
    </script>
</section>