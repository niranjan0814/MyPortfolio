@props([])

@php
    $user = \App\Models\User::first();
@endphp

<section id="contact" class="section-full relative overflow-hidden theme2-contact-v2">

    <!-- Cyber Grid Background -->
    <div class="absolute inset-0 -z-10">
        <div class="contact-grid-bg"></div>
        <div class="contact-gradient-mesh"></div>
    </div>

    <div class="container mx-auto max-w-7xl relative z-10 px-4 md:px-6">

        <!-- Section Header -->
        <div class="text-center mb-16 animate-fade-in">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full mb-6 contact-badge">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
                <span class="text-sm font-semibold uppercase tracking-wider">Get In Touch</span>
            </div>

            <h2 class="text-5xl md:text-6xl font-black mb-6 contact-title">
                Let's Connect
            </h2>



            <div class="flex items-center justify-center gap-4">
                <div class="h-px flex-1 max-w-24 contact-divider"></div>
                <div class="w-2.5 h-2.5 rounded-full contact-dot"></div>
                <div class="h-px flex-1 max-w-24 contact-divider"></div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="max-w-4xl mx-auto mb-8 animate-slide-down">
                <div class="contact-success-box">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="font-bold">Success!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="max-w-4xl mx-auto mb-8 animate-shake">
                <div class="contact-error-box">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">

            <!-- Left: Contact Info -->
            <div class="space-y-8">
                <div class="contact-info-card">
                    <div class="contact-card-inner">
                        <div class="contact-shine"></div>

                        <h3 class="contact-card-title mb-6">Contact Information</h3>

                        <div class="space-y-6">
                            @if($user->email)
                                <div class="contact-info-item">
                                    <div class="contact-icon-box contact-icon-blue">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="contact-info-label">Email</p>
                                        <a href="mailto:{{ $user->email }}"
                                            class="contact-info-value">{{ $user->email }}</a>
                                    </div>
                                </div>
                            @endif

                            @if($user->phone)
                                <div class="contact-info-item">
                                    <div class="contact-icon-box contact-icon-green">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="contact-info-label">Phone</p>
                                        <a href="tel:{{ $user->phone }}" class="contact-info-value">{{ $user->phone }}</a>
                                    </div>
                                </div>
                            @endif

                            @if($user->address)
                                <div class="contact-info-item">
                                    <div class="contact-icon-box contact-icon-purple">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="contact-info-label">Location</p>
                                        <p class="contact-info-value">{{ $user->address }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Social Links -->
                        @if($user->linkedin_url || $user->github_url)
                            <div class="mt-8 pt-8 border-t contact-border">
                                <h4 class="contact-social-title mb-4">Follow Me</h4>
                                <div class="flex gap-4">
                                    @if($user->linkedin_url)
                                        <a href="{{ $user->linkedin_url }}" target="_blank"
                                            class="contact-social-btn contact-social-linkedin">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                            </svg>
                                        </a>
                                    @endif

                                    @if($user->github_url)
                                        <a href="{{ $user->github_url }}" target="_blank"
                                            class="contact-social-btn contact-social-github">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right: Contact Form -->
            <div>
                <div class="contact-form-card">
                    <div class="contact-card-inner">
                        <div class="contact-shine"></div>

                        <h3 class="contact-card-title mb-6">Send a Message</h3>

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="portfolio_user_id" value="{{ $user->id }}">
                            <div>
                                <label class="contact-label">Your Name *</label>
                                <input type="text" name="name" required class="contact-input" placeholder="John Doe"
                                    value="{{ old('name') }}">
                            </div>

                            <div>
                                <label class="contact-label">Your Email *</label>
                                <input type="email" name="email" required class="contact-input"
                                    placeholder="john@example.com" value="{{ old('email') }}">
                            </div>

                            <div>
                                <label class="contact-label">Subject</label>
                                <input type="text" name="subject" class="contact-input" placeholder="Project Discussion"
                                    value="{{ old('subject') }}">
                            </div>

                            <div>
                                <label class="contact-label">Message *</label>
                                <textarea name="message" rows="5" required class="contact-input resize-none"
                                    placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                            </div>

                            <button type="submit" class="contact-submit-btn">
                                <span>Send Message</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Theme 2 Contact - Dual Theme Support */

    [data-theme="light"] {
        --contact-bg: #f8fafc;
        --contact-text-primary: #0f172a;
        --contact-text-secondary: #475569;
        --contact-text-muted: #64748b;
        --contact-card-bg: #ffffff;
        --contact-card-border: #e2e8f0;
        --contact-accent: #3b82f6;
        --contact-accent-hover: #2563eb;
        --contact-grid-color: rgba(59, 130, 246, 0.03);
        --contact-success-bg: #dcfce7;
        --contact-success-border: #16a34a;
        --contact-success-text: #15803d;
        --contact-error-bg: #fee2e2;
        --contact-error-border: #dc2626;
        --contact-error-text: #991b1b;
        --contact-input-bg: #f8fafc;
        --contact-input-border: #e2e8f0;
    }

    [data-theme="dark"] {
        --contact-bg: #0f172a;
        --contact-text-primary: #f1f5f9;
        --contact-text-secondary: #cbd5e1;
        --contact-text-muted: #94a3b8;
        --contact-card-bg: #1e293b;
        --contact-card-border: #334155;
        --contact-accent: #60a5fa;
        --contact-accent-hover: #3b82f6;
        --contact-grid-color: rgba(96, 165, 250, 0.05);
        --contact-success-bg: #064e3b;
        --contact-success-border: #10b981;
        --contact-success-text: #6ee7b7;
        --contact-error-bg: #7f1d1d;
        --contact-error-border: #ef4444;
        --contact-error-text: #fca5a5;
        --contact-input-bg: #0f172a;
        --contact-input-border: #334155;
    }

    .theme2-contact-v2 {
        background: var(--contact-bg);
        padding: 6rem 0;
    }

    .contact-grid-bg {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(var(--contact-grid-color) 1px, transparent 1px),
            linear-gradient(90deg, var(--contact-grid-color) 1px, transparent 1px);
        background-size: 60px 60px;
    }

    .contact-gradient-mesh {
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 50%, var(--contact-accent) 0%, transparent 60%);
        opacity: 0.03;
        filter: blur(80px);
    }

    .contact-badge {
        background: var(--contact-card-bg);
        border: 2px solid var(--contact-card-border);
        color: var(--contact-accent);
    }

    .contact-title {
        color: var(--contact-text-primary);
        line-height: 1.1;
    }

    .contact-description {
        color: var(--contact-text-secondary);
    }

    .contact-divider {
        background: linear-gradient(90deg, transparent, var(--contact-accent), transparent);
        height: 2px;
    }

    .contact-dot {
        background: var(--contact-accent);
        box-shadow: 0 0 10px var(--contact-accent);
    }

    .contact-success-box {
        display: flex;
        align-items-start;
        gap: 1rem;
        padding: 1rem 1.5rem;
        background: var(--contact-success-bg);
        border: 2px solid var(--contact-success-border);
        color: var(--contact-success-text);
        border-radius: 16px;
    }

    .contact-error-box {
        display: flex;
        align-items-start;
        gap: 1rem;
        padding: 1rem 1.5rem;
        background: var(--contact-error-bg);
        border: 2px solid var(--contact-error-border);
        color: var(--contact-error-text);
        border-radius: 16px;
    }

    .contact-info-card,
    .contact-form-card {
        height: 100%;
    }

    .contact-card-inner {
        position: relative;
        height: 100%;
        background: var(--contact-card-bg);
        border: 2px solid var(--contact-card-border);
        border-radius: 24px;
        padding: 2rem;
        transition: all 0.4s ease;
        overflow: hidden;
    }

    .contact-info-card:hover .contact-card-inner,
    .contact-form-card:hover .contact-card-inner {
        border-color: var(--contact-accent);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .contact-shine {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.05), transparent);
        transition: left 0.6s;
    }

    .contact-card-inner:hover .contact-shine {
        left: 100%;
    }

    .contact-card-title {
        font-size: 1.875rem;
        font-weight: 800;
        color: var(--contact-text-primary);
    }

    .contact-info-item {
        display: flex;
        align-items-start;
        gap: 1rem;
    }

    .contact-icon-box {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        flex-shrink: 0;
        transition: transform 0.3s ease;
    }

    .contact-info-item:hover .contact-icon-box {
        transform: scale(1.1);
    }

    .contact-icon-blue {
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
    }

    [data-theme="dark"] .contact-icon-blue {
        background: rgba(96, 165, 250, 0.15);
        color: #60a5fa;
    }

    .contact-icon-green {
        background: rgba(16, 185, 129, 0.1);
        color: #10b981;
    }

    [data-theme="dark"] .contact-icon-green {
        background: rgba(52, 211, 153, 0.15);
        color: #34d399;
    }

    .contact-icon-purple {
        background: rgba(139, 92, 246, 0.1);
        color: #8b5cf6;
    }

    [data-theme="dark"] .contact-icon-purple {
        background: rgba(167, 139, 250, 0.15);
        color: #a78bfa;
    }

    .contact-info-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--contact-text-muted);
        margin-bottom: 0.25rem;
    }

    .contact-info-value {
        font-size: 1rem;
        font-weight: 600;
        color: var(--contact-text-primary);
        transition: color 0.2s;
    }

    a.contact-info-value:hover {
        color: var(--contact-accent);
    }

    .contact-border {
        border-color: var(--contact-card-border);
    }

    .contact-social-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--contact-text-primary);
    }

    .contact-social-btn {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .contact-social-btn:hover {
        transform: translateY(-4px);
    }

    .contact-social-linkedin {
        background: rgba(14, 118, 168, 0.1);
        color: #0e76a8;
    }

    [data-theme="dark"] .contact-social-linkedin {
        background: rgba(14, 118, 168, 0.2);
        color: #0ea5e9;
    }

    .contact-social-github {
        background: rgba(51, 51, 51, 0.1);
        color: #333333;
    }

    [data-theme="dark"] .contact-social-github {
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
    }

    .contact-label {
        display: block;
        font-size: 0.9375rem;
        font-weight: 600;
        color: var(--contact-text-primary);
        margin-bottom: 0.5rem;
    }

    .contact-input {
        width: 100%;
        padding: 0.875rem 1.25rem;
        background: var(--contact-input-bg);
        border: 2px solid var(--contact-input-border);
        border-radius: 12px;
        color: var(--contact-text-primary);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .contact-input:focus {
        outline: none;
        border-color: var(--contact-accent);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
    }

    .contact-submit-btn {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 1rem 2rem;
        background: linear-gradient(135deg, var(--contact-accent), var(--contact-accent-hover));
        color: white;
        font-size: 1.125rem;
        font-weight: 700;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .contact-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
    }

    .contact-submit-btn:active {
        transform: translateY(0);
    }

    @keyframes slide-down {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-slide-down {
        animation: slide-down 0.5s ease-out;
    }

    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-10px);
        }

        75% {
            transform: translateX(10px);
        }
    }

    .animate-shake {
        animation: shake 0.5s ease-in-out;
    }

    .animate-fade-in {
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @media (max-width: 1024px) {
        .theme2-contact-v2 {
            padding: 4rem 0;
        }

        .contact-title {
            font-size: 2.5rem;
        }

        .contact-card-inner {
            padding: 1.5rem;
        }
    }
</style>