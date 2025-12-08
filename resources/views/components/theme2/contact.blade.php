@props(['user', 'contactContent' => null])

<style>
    /* Reuse Theme 2 Variables */
    :root {
        --t2-bg: #F8F9FA;
        --t2-text-main: #2C2E3E;
        --t2-text-sub: #6B7280;
        --t2-accent: #E89B0C;
        --t2-accent-hover: #D97706;
        --t2-surface: #FFFFFF;
        --t2-border: rgba(44, 46, 62, 0.08);
        --t2-card-bg: #FFFFFF;
        --t2-glass-border: rgba(44, 46, 62, 0.05);
        --t2-shadow: 0 20px 60px rgba(233, 155, 12, 0.12);
        --t2-gradient: linear-gradient(135deg, #E89B0C 0%, #D97706 100%);
    }

    [data-theme="dark"] {
        --t2-bg: #2C2E3E;
        --t2-text-main: #FFFFFF;
        --t2-text-sub: #E5E7EB;
        --t2-accent: #F5A623;
        --t2-accent-hover: #E09612;
        --t2-surface: rgba(255, 255, 255, 0.05);
        --t2-border: rgba(255, 255, 255, 0.1);
        --t2-card-bg: rgba(255, 255, 255, 0.03);
        --t2-glass-border: rgba(255, 255, 255, 0.1);
        --t2-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        --t2-gradient: linear-gradient(135deg, #F5A623 0%, #D97706 100%);
    }

    .t2-contact-section {
        background-color: var(--t2-bg);
        color: var(--t2-text-main);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }

    .t2-contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: start;
    }

    .t2-contact-info {
        padding-right: 2rem;
    }

    .t2-contact-heading {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        color: var(--t2-text-main);
    }

    .t2-contact-desc {
        color: var(--t2-text-sub);
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 3rem;
    }

    .t2-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .t2-contact-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--t2-accent);
        flex-shrink: 0;
    }

    .t2-contact-details h4 {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--t2-text-sub);
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .t2-contact-details p, .t2-contact-details a {
        font-size: 1.1rem;
        color: var(--t2-text-main);
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .t2-contact-details a:hover {
        color: var(--t2-accent);
    }

    /* Form */
    .t2-contact-form-card {
        background: var(--t2-card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t2-glass-border);
        border-radius: 24px;
        padding: 3rem;
        box-shadow: var(--t2-shadow);
    }

    .t2-form-group {
        margin-bottom: 1.5rem;
    }

    .t2-form-label {
        display: block;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--t2-text-main);
        margin-bottom: 0.5rem;
    }

    .t2-form-input, .t2-form-textarea {
        width: 100%;
        padding: 1rem;
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        border-radius: 12px;
        color: var(--t2-text-main);
        font-family: inherit;
        transition: all 0.3s ease;
    }

    .t2-form-input:focus, .t2-form-textarea:focus {
        outline: none;
        border-color: var(--t2-accent);
        box-shadow: 0 0 0 3px rgba(233, 155, 12, 0.1);
    }

    .t2-submit-btn {
        width: 100%;
        padding: 1rem;
        background: var(--t2-gradient);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(233, 155, 12, 0.3);
    }

    .t2-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(233, 155, 12, 0.4);
    }

    @media (max-width: 1024px) {
        .t2-contact-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Mobile Optimizations */
    @media (max-width: 640px) {
        .t2-contact-section {
            padding: 4rem 0;
        }

        .t2-container {
            padding: 0 1rem;
        }

        /* Hide description and contact info on mobile */
        .t2-contact-desc {
            display: none;
        }

        .t2-contact-list {
            display: none;
        }

        .t2-contact-heading {
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .t2-contact-info {
            padding-right: 0;
        }

        .t2-contact-grid {
            gap: 2rem;
        }

        .t2-contact-form-card {
            padding: 2rem 1.5rem;
        }

        .t2-form-group {
            margin-bottom: 1.25rem;
        }

        .t2-form-input, .t2-form-textarea {
            padding: 0.875rem;
            font-size: 0.95rem;
        }

        .t2-submit-btn {
            padding: 0.875rem;
        }
    }
</style>

<section id="contact" class="t2-contact-section">
    <div class="t2-container">
        <div class="t2-contact-grid">
            <!-- Left: Info -->
            <div class="t2-contact-info">
                <h2 class="t2-contact-heading">Let's Work Together</h2>
                <p class="t2-contact-desc">
                    {{ $contactContent['message'] ?? "I'm always interested in hearing about new projects and opportunities. Whether you have a question or just want to say hi, feel free to reach out!" }}
                </p>

                <div class="t2-contact-list">
                    @if($user->email)
                    <div class="t2-contact-item">
                        <div class="t2-contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div class="t2-contact-details">
                            <h4>Email</h4>
                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                        </div>
                    </div>
                    @endif

                    @if($user->phone)
                    <div class="t2-contact-item">
                        <div class="t2-contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div class="t2-contact-details">
                            <h4>Phone</h4>
                            <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                        </div>
                    </div>
                    @endif

                    @if($user->location)
                    <div class="t2-contact-item">
                        <div class="t2-contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div class="t2-contact-details">
                            <h4>Location</h4>
                            <p>{{ $user->location }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Right: Form -->
            <div class="t2-contact-form-card">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="portfolio_user_id" value="{{ $user->id }}">
                    
                    <div class="t2-form-group">
                        <label for="name" class="t2-form-label">Name</label>
                        <input type="text" id="name" name="name" class="t2-form-input" required placeholder="John Doe">
                    </div>

                    <div class="t2-form-group">
                        <label for="email" class="t2-form-label">Email</label>
                        <input type="email" id="email" name="email" class="t2-form-input" required placeholder="john@example.com">
                    </div>

                    <div class="t2-form-group">
                        <label for="subject" class="t2-form-label">Subject</label>
                        <input type="text" id="subject" name="subject" class="t2-form-input" placeholder="Project Inquiry">
                    </div>

                    <div class="t2-form-group">
                        <label for="message" class="t2-form-label">Message</label>
                        <textarea id="message" name="message" rows="5" class="t2-form-textarea" required placeholder="Tell me about your project..."></textarea>
                    </div>

                    <button type="submit" class="t2-submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
