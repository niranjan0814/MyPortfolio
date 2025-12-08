@props(['user', 'contactContent', 'portfolioOwnerId' => null])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON & AURORA SOFT LIGHT
       Internal Styles for Footer Component
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

    /* Footer Layout */
    .t1-footer {
        background: var(--t1-bg-secondary);
        position: relative;
        overflow: hidden;
        border-top: 1px solid var(--t1-border-color);
        font-family: 'Inter', sans-serif;
        padding: 0;
        margin: 0;
    }

    .t1-footer-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 4rem 2rem 0;
        position: relative;
        z-index: 10;
        width: 100%;
        box-sizing: border-box;
    }

    .t1-footer-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
        margin-bottom: 3rem;
    }

    @media (min-width: 768px) {
        .t1-footer-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .t1-footer-grid {
            grid-template-columns: 2fr 1fr 1fr;
        }
    }

    /* Brand Section */
    .t1-footer-brand h2 {
        font-size: 2rem;
        font-weight: 800;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 1rem;
    }

    .t1-footer-description {
        color: var(--t1-text-secondary);
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .t1-footer-location {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--t1-text-muted);
        font-size: 0.875rem;
    }

    .t1-footer-location svg {
        width: 16px;
        height: 16px;
        color: var(--t1-accent-primary);
        flex-shrink: 0;
    }

    /* Section Titles */
    .t1-footer-section-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--t1-text-primary);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .t1-footer-section-title svg {
        width: 20px;
        height: 20px;
        color: var(--t1-accent-primary);
    }

    /* Quick Links */
    .t1-footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .t1-footer-link-item {
        margin-bottom: 0.75rem;
    }

    .t1-footer-link {
        color: var(--t1-text-secondary);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .t1-footer-link:hover {
        color: var(--t1-accent-primary);
        transform: translateX(4px);
    }

    .t1-footer-link svg {
        width: 12px;
        height: 12px;
        transition: transform 0.3s ease;
    }

    .t1-footer-link:hover svg {
        transform: translateX(2px);
    }

    /* Contact Info */
    .t1-contact-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .t1-contact-item {
        margin-bottom: 1rem;
    }

    .t1-contact-link {
        color: var(--t1-text-secondary);
        text-decoration: none;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        transition: color 0.3s ease;
    }

    .t1-contact-link:hover {
        color: var(--t1-accent-primary);
    }

    .t1-contact-link svg {
        width: 16px;
        height: 16px;
        color: var(--t1-accent-primary);
        flex-shrink: 0;
        margin-top: 2px;
    }

    /* Social Icons */
    .t1-social-icons {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .t1-social-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--t1-surface-card);
        border: 1px solid var(--t1-border-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--t1-text-primary);
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
    }

    .t1-social-icon:hover {
        transform: translateY(-4px) scale(1.1);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 0 20px var(--t1-icon-glow);
        color: var(--t1-accent-primary);
    }

    .t1-social-icon svg {
        width: 20px;
        height: 20px;
    }

    /* Tooltip */
    .t1-tooltip {
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(-8px);
        padding: 0.5rem 0.75rem;
        background: var(--t1-surface-card);
        border: 1px solid var(--t1-border-color);
        border-radius: 0.5rem;
        font-size: 0.75rem;
        color: var(--t1-text-primary);
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    .t1-social-icon:hover .t1-tooltip {
        opacity: 1;
    }

    /* Bottom Bar */
    .t1-footer-bottom {
        border-top: 1px solid var(--t1-border-color);
        padding: 2rem;
        text-align: center;
        margin: 0;
    }

    @media (max-width: 640px) {
        .t1-footer-bottom {
            padding: 1.5rem 1rem;
        }

        .t1-footer-copyright {
            font-size: 0.8125rem;
            line-height: 1.6;
        }
    }

    .t1-footer-copyright {
        color: var(--t1-text-muted);
        font-size: 0.875rem;
        margin: 0;
        padding: 0;
        line-height: 1.5;
    }

    /* Background Blobs */
    .t1-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.2;
        z-index: 0;
        animation: t1-blob-float 15s infinite alternate;
    }

    .t1-blob-1 { top: -100px; right: -100px; width: 400px; height: 400px; background: var(--t1-accent-glow); }
    .t1-blob-2 { bottom: -100px; left: -100px; width: 350px; height: 350px; background: var(--t1-accent-secondary); animation-delay: -7s; }

    @keyframes t1-blob-float {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(30px, -30px) scale(1.1); }
    }

    /* Mobile Responsiveness */
    @media (max-width: 640px) {
        .t1-footer-container {
            padding: 3rem 1rem 0;
        }

        .t1-footer-grid {
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .t1-footer-brand h2 {
            font-size: 1.75rem;
            margin-bottom: 0.75rem;
        }

        /* Hide description on mobile */
        .t1-footer-description {
            display: none;
        }

        .t1-footer-location {
            margin-bottom: 1rem;
        }

        .t1-social-icons {
            margin-top: 1rem;
            gap: 0.75rem;
        }

        .t1-social-icon {
            width: 44px;
            height: 44px;
        }

        .t1-social-icon svg {
            width: 18px;
            height: 18px;
        }

        /* Collapsible Sections */
        .t1-footer-toggle {
            width: 100%;
            background: none;
            border: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0;
            cursor: pointer;
            text-align: left;
        }

        .t1-footer-content {
            display: none;
            margin-top: 1rem;
        }

        .t1-footer-content.active {
            display: block;
            animation: t1-slide-down 0.3s ease;
        }

        .t1-footer-icon-rotate {
            transition: transform 0.3s ease;
            color: var(--t1-accent-primary);
            font-size: 1.5rem;
            transform: rotate(90deg); /* Pointing down/right depending on preferred icon */
        }

        .t1-footer-toggle.active .t1-footer-icon-rotate {
            transform: rotate(-90deg);
        }

        .t1-footer-section {
            border-bottom: 1px solid var(--t1-border-color);
            padding-bottom: 1rem;
        }
        
        .t1-footer-section:last-child {
            border-bottom: none;
        }

        .t1-footer-section-title {
            margin-bottom: 0;
            font-size: 1.1rem;
        }
    }

    @keyframes t1-slide-down {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<footer class="t1-footer">
    <!-- Background Elements -->
    <div class="t1-blob t1-blob-1"></div>
    <div class="t1-blob t1-blob-2"></div>

    <div class="t1-footer-container">
        <div class="t1-footer-grid">
            <!-- Brand & About -->
            <div class="t1-footer-brand">
                <h2>{{ $user->full_name ?? 'Your Name' }}</h2>
                <p class="t1-footer-description">
                    {{ Str::limit($user->description ?? 'Building innovative solutions and creating impactful experiences through code.', 150) }}
                </p>
                @if($user->location)
                    <div class="t1-footer-location">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $user->location }}</span>
                    </div>
                @endif

                <!-- Social Icons -->
                <div class="t1-social-icons">
                    @if($user->github_url)
                        <a href="{{ $user->github_url }}" target="_blank" class="t1-social-icon">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            <span class="t1-tooltip">GitHub</span>
                        </a>
                    @endif
                    @if($user->linkedin_url)
                        <a href="{{ $user->linkedin_url }}" target="_blank" class="t1-social-icon">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                            <span class="t1-tooltip">LinkedIn</span>
                        </a>
                    @endif
                    @if($user->email)
                        <a href="mailto:{{ $user->email }}" class="t1-social-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="t1-tooltip">Email</span>
                        </a>
                    @endif
                    @if($user->phone)
                        <a href="tel:{{ $user->phone }}" class="t1-social-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <span class="t1-tooltip">Phone</span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div class="t1-footer-section">
                <button class="t1-footer-toggle" onclick="toggleFooterSectionT1(this)">
                    <h3 class="t1-footer-section-title">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                        </svg>
                        Quick Links
                    </h3>
                    <span class="t1-footer-icon-rotate hidden sm:hidden">›</span>
                </button>
                <div class="t1-footer-content">
                    <ul class="t1-footer-links">
                        @foreach(['About Me' => '#about', 'Projects' => '#projects', 'Skills' => '#skills', 'Experience' => '#experience', 'Education' => '#education', 'Contact' => '#contact'] as $text => $url)
                            <li class="t1-footer-link-item">
                                <a href="{{ $url }}" class="t1-footer-link">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                    {{ $text }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="t1-footer-section">
                <button class="t1-footer-toggle" onclick="toggleFooterSectionT1(this)">
                    <h3 class="t1-footer-section-title">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Get In Touch
                    </h3>
                    <span class="t1-footer-icon-rotate hidden sm:hidden">›</span>
                </button>
                <div class="t1-footer-content">
                    <ul class="t1-contact-list">
                        @if($user->email)
                            <li class="t1-contact-item">
                                <a href="mailto:{{ $user->email }}" class="t1-contact-link">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span style="word-break: break-all;">{{ $user->email }}</span>
                                </a>
                            </li>
                        @endif
                        @if($user->phone)
                            <li class="t1-contact-item">
                                <a href="tel:{{ $user->phone }}" class="t1-contact-link">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                    <span>{{ $user->phone }}</span>
                                </a>
                            </li>
                        @endif
                        @if($user->address)
                            <li class="t1-contact-item">
                                <div class="t1-contact-link" style="cursor: default;">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ $user->address }}</span>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="t1-footer-bottom">
            <p class="t1-footer-copyright">
                © {{ date('Y') }}  All rights reserved. Built with Detech ❤️ by {{ $user->full_name ?? 'Your Name' }}
            </p>
        </div>
    </div>
</footer>

<script>
    function toggleFooterSectionT1(button) {
        if (window.innerWidth >= 640) return; // Only work on mobile

        const content = button.nextElementSibling;
        const icon = button.querySelector('.t1-footer-icon-rotate');
        
        button.classList.toggle('active');
        content.classList.toggle('active');
    }

    // Initialize state on load/resize
    document.addEventListener('DOMContentLoaded', function() {
        function checkFooterState() {
            const isMobile = window.innerWidth < 640;
            const contents = document.querySelectorAll('.t1-footer-content');
            const icons = document.querySelectorAll('.t1-footer-icon-rotate');
            
            contents.forEach(content => {
                if (!isMobile) {
                    content.classList.add('active'); // Always show on desktop
                    content.style.display = 'block';
                } else {
                    if (!content.previousElementSibling.classList.contains('active')) {
                        content.classList.remove('active');
                        content.style.display = ''; // Clear inline style to let CSS handle it
                    }
                }
            });

            icons.forEach(icon => {
                if (isMobile) {
                    icon.classList.remove('hidden');
                } else {
                    icon.classList.add('hidden');
                }
            });
        }

        checkFooterState();
        window.addEventListener('resize', checkFooterState);
    });
</script>