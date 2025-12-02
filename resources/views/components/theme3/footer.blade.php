@props([])

@php
    $user = \App\Models\User::first();
@endphp

<style>
    /* ============================================
       THEME 3 FOOTER - MODERN CLEAN DESIGN
       ============================================ */
    
    :root {
        --t3-footer-bg: #f8fafc;
        --t3-footer-surface: #ffffff;
        --t3-footer-text: #1a202c;
        --t3-footer-text-muted: #718096;
        --t3-footer-accent: #00cc7a;
        --t3-footer-accent-2: #0099cc;
        --t3-footer-border: rgba(0, 204, 122, 0.15);
        --t3-footer-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
    }

    [data-theme="dark"] {
        --t3-footer-bg: #050508;
        --t3-footer-surface: #0a0a12;
        --t3-footer-text: #ffffff;
        --t3-footer-text-muted: #a0aec0;
        --t3-footer-accent: #00ff9d;
        --t3-footer-accent-2: #00d4ff;
        --t3-footer-border: rgba(0, 255, 157, 0.1);
        --t3-footer-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
    }

    .t3-footer {
        background: var(--t3-footer-bg);
        border-top: 1px solid var(--t3-footer-border);
        padding: 5rem 0 2rem;
        position: relative;
        overflow: hidden;
    }

    .t3-footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .t3-footer-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr 1fr 1fr;
        gap: 4rem;
        margin-bottom: 4rem;
    }

    /* Brand Column */
    .t3-footer-brand h3 {
        font-size: 2rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        background: var(--t3-footer-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: inline-block;
    }

    .t3-footer-desc {
        color: var(--t3-footer-text-muted);
        line-height: 1.7;
        margin-bottom: 2rem;
        max-width: 300px;
    }

    /* Links Column */
    .t3-footer-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--t3-footer-text);
        margin-bottom: 1.5rem;
    }

    .t3-footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .t3-footer-link {
        margin-bottom: 0.75rem;
    }

    .t3-footer-link a {
        color: var(--t3-footer-text-muted);
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .t3-footer-link a:hover {
        color: var(--t3-footer-accent);
        transform: translateX(5px);
    }

    /* Social Icons */
    .t3-footer-social {
        display: flex;
        gap: 1rem;
    }

    .t3-social-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--t3-footer-surface);
        border: 1px solid var(--t3-footer-border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--t3-footer-text-muted);
        transition: all 0.3s ease;
    }

    .t3-social-icon:hover {
        background: var(--t3-footer-gradient);
        color: white;
        border-color: transparent;
        transform: translateY(-3px);
    }

    /* Bottom Bar */
    .t3-footer-bottom {
        border-top: 1px solid var(--t3-footer-border);
        padding-top: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .t3-copyright {
        color: var(--t3-footer-text-muted);
        font-size: 0.9375rem;
    }

    .t3-made-with {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--t3-footer-text-muted);
        font-size: 0.9375rem;
    }

    .t3-heart {
        color: #ef4444;
        animation: heartbeat 1.5s infinite;
    }

    @keyframes heartbeat {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.2); }
    }

    /* Responsive */
    @media (max-width: 992px) {
        .t3-footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }
    }

    @media (max-width: 576px) {
        .t3-footer-grid {
            grid-template-columns: 1fr;
            gap: 2.5rem;
        }
        
        .t3-footer-bottom {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<footer class="t3-footer">
    <div class="t3-footer-container">
        <div class="t3-footer-grid">
            <!-- Brand -->
            <div class="t3-footer-brand">
                <h3>{{ $user->name }}</h3>
                <p class="t3-footer-desc">
                    {{ $user->description ?? 'Building digital experiences with passion and precision.' }}
                </p>
                <div class="t3-footer-social">
                    @if($user->github_url)
                        <a href="{{ $user->github_url }}" target="_blank" class="t3-social-icon" title="GitHub">
                            <i class="fab fa-github"></i>
                        </a>
                    @endif
                    @if($user->linkedin_url)
                        <a href="{{ $user->linkedin_url }}" target="_blank" class="t3-social-icon" title="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    @endif
                    @if($user->twitter_url)
                        <a href="{{ $user->twitter_url }}" target="_blank" class="t3-social-icon" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="t3-footer-title">Quick Links</h4>
                <ul class="t3-footer-links">
                    <li class="t3-footer-link"><a href="#about">About Me</a></li>
                    <li class="t3-footer-link"><a href="#projects">Projects</a></li>
                    <li class="t3-footer-link"><a href="#skills">Skills</a></li>
                    <li class="t3-footer-link"><a href="#experience">Experience</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h4 class="t3-footer-title">Resources</h4>
                <ul class="t3-footer-links">
                    <li class="t3-footer-link"><a href="#blog">Blog</a></li>
                    <li class="t3-footer-link"><a href="#education">Education</a></li>
                    <li class="t3-footer-link"><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="t3-footer-title">Contact</h4>
                <ul class="t3-footer-links">
                    @if($user->email)
                        <li class="t3-footer-link">
                            <a href="mailto:{{ $user->email }}">
                                <i class="fas fa-envelope" style="color: var(--t3-footer-accent);"></i>
                                {{ $user->email }}
                            </a>
                        </li>
                    @endif
                    @if($user->phone)
                        <li class="t3-footer-link">
                            <a href="tel:{{ $user->phone }}">
                                <i class="fas fa-phone-alt" style="color: var(--t3-footer-accent);"></i>
                                {{ $user->phone }}
                            </a>
                        </li>
                    @endif
                    @if($user->address)
                        <li class="t3-footer-link">
                            <a href="#">
                                <i class="fas fa-map-marker-alt" style="color: var(--t3-footer-accent);"></i>
                                {{ $user->address }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="t3-footer-bottom">
            <div class="t3-copyright">
                &copy; {{ date('Y') }} {{ $user->name }}. All rights reserved.
            </div>
            <div class="t3-made-with">
                Made with <i class="fas fa-heart t3-heart"></i> by {{ $user->name }}
            </div>
        </div>
    </div>
</footer>